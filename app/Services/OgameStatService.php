<?php

namespace App\Services;

use App\Modules\OgameStat;
use App\Modules\Server;
use voku\helper\HtmlDomParser;

class OgameStatService
{
    public function __construct(OgameStat $ogameStat, PlayerService $playerService, ServerService $serverService)
    {
        $this->ogameStat = $ogameStat;
        $this->playerService = $playerService;
        $this->serverService = $serverService;
    }

    public function statsPoints(array $requestData)
    {
        $url = !empty($requestData['url']) ? $requestData['url'] : '';
        $server = $this->serverService->getServerBySlug($url);
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
                    $this->insertData($playerId, $playerName, $requestData['type'], $position, $score, $server);
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
        $score = str_replace('.', '', $score);

        return str_replace(',', '', $score);
    }

    public function getPlayerId($item)
    {
        $playerId = $item->findOne('.sendMail');

        if(!$playerId) {
            return 0;
        }

        $attributes = $playerId->getAllAttributes();

        $id = !empty($attributes['data-playerid']) ? $attributes['data-playerid'] : 0;

        if (empty($id)) {
            $attributes = $item->getAllAttributes();

            if (empty($attributes['id'])) {
                return 0;
            }

            $id = str_replace('position', '', $attributes['id']);

            return (int) $id;
        }

        return $id;
    }

    public function insertData($playerId, $playerName, $type, $position, $score, $server)
    {
        if (empty($playerId) || empty($playerName) || empty($type) || empty($position)) {
            dd($playerName,$playerId,$position,'taip');
            return false;
        }

        $stat = new OgameStat();
        $stat->player_id = $this->playerService->getPlayerId($playerName, $playerId, $server);
        $stat->rank = $position;
        $stat->point = $score;
        $stat->type = $type;

        return $stat->save();
    }
}
