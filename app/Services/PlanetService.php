<?php

namespace App\Services;

use App\Modules\OgameStat;
use App\Modules\Planet;
use voku\helper\HtmlDomParser;

class PlanetService
{
    public function __construct(Planet $planet, PlayerService $playerService)
    {
        $this->planet = $planet;
        $this->playerService = $playerService;
    }

    public function statsPoints(array $requestData)
    {
        $html = HtmlDomParser::str_get_html($requestData['data']);
        $rankList = $html->findOne('.userHighscore');
        $list = $rankList->find('tr');
        if ($list) {
            foreach ($list as $key => $val) {
                $position = $this->getPosition($val);

                if ($position) {
                    $playerName = $this->getPlayerName($val);
                    $score = $this->getScore($val);
                    $playerId = $this->getPlayerId($val);
                    $this->insertData($playerId, $playerName, $requestData['type'], $position, $score);
                }
            }
        }

        return true;
    }

    public function getPosition($item)
    {
        $position = $item->findOne('.position');

        if(!$position) {
            return 0;
        }

        return (int)$position->nodeValue;
    }

    public function getPlayerName($item)
    {
        $playerName = $item->findOne('.playername');

        if(!$playerName) {
            return 0;
        }

        return trim($playerName->nodeValue);
    }

    public function getScore($item)
    {
        $score = $item->findOne('.score');

        if(!$score) {
            return 0;
        }

        $score = trim($score->nodeValue);

        return str_replace('.', '', $score);
    }

    public function getPlayerId($item)
    {
        $playerId = $item->findOne('.sendMail');

        if(!$playerId) {
            return 0;
        }

        $attributes = $playerId->getAllAttributes();

        return !empty($attributes['data-playerid']) ? $attributes['data-playerid'] : 0;
    }

    public function insertData($playerId, $playerName, $type, $position, $score)
    {
        if (empty($playerId) || empty($playerName) || empty($type) || empty($position)) {
            return false;
        }

        $stat = new OgameStat();
        $stat->player_id = $this->playerService->getPlayerId($playerName, $playerId);
        $stat->rank = $position;
        $stat->point = $score;
        $stat->type = $type;

        return $stat->save();
    }
}
