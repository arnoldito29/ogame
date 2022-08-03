<?php

namespace App\Services;

use App\Modules\OgameStat;
use App\Modules\Planet;
use App\Modules\Server;
use Carbon\Carbon;
use voku\helper\HtmlDomParser;

class PlanetService
{
    public function __construct(Planet $planet, PlayerService $playerService, ServerService $serverService)
    {
        $this->planet = $planet;
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

    public function insertData($playerId, $playerName, $type, $position, $score, ?Server $server)
    {
        if (empty($playerId) || empty($playerName) || empty($type) || empty($position)) {
            return false;
        }

        $stat = new OgameStat();
        $stat->player_id = $this->playerService->getPlayerId($playerName, $playerId, $server);
        $stat->rank = $position;
        $stat->point = $score;
        $stat->type = $type;

        return $stat->save();
    }

    public function setGalaxy(array $requestData)
    {
        $url = !empty($requestData['url']) ? $requestData['url'] : '';
        $server = $this->serverService->getServerBySlug($url);
        $html = HtmlDomParser::str_get_html($requestData['data']);
        $planetsList = $html->findOne('#middle');

        if (!$planetsList->hasAttribute('id')) {
            return false;
        }

        $list = $planetsList->findOne('#galaxyContent');

        $galaxy = $requestData['galaxy'] ?? 0;
        $system = $requestData['system'] ?? 0;

        $rows = $list->find('.ctContentRow');

        foreach ($rows as $key => $value) {
            $rowClass =  trim($value->getAttribute('class'));
            $class = preg_split('/ /', $rowClass);

            if (in_array('empty_filter', $class)) {
                $this->removePlanet($galaxy, $system, $key+1);
            } else {
                $name = trim($value->findOne('.cellPlanetName')->nodeValue);
                $playerId = $this->getPlayerGalaxyId($value);
                $moon = $this->getMoon($value);
                $status = $this->getPlayerStatus($class, $value);
                $this->updatePlayerPlanet($playerId, $name, $galaxy, $system, $key+1, $server);
                $this->updatePlayerMoon($playerId, $moon, $galaxy, $system, $key+1, $server);
                $this->playerService->updatePlayerStatus($playerId, $status, $server);
            }
        }

        return true;
    }

    public function getPlayerGalaxyId($value)
    {
        $playerSpans = $value->findOne('.cellPlayerName')->find('span');

        foreach ($playerSpans as $span) {
            $player = $span->getAttribute('rel');

            $playerId = preg_split('/player/', $player);

            if (!empty($playerId[1])) {
                break;
            }
        }

        return $playerId[1] ?? ($playerId[0] ?? 0);
    }

    public function updatePlayerMoon($playerId, $moon, int $galaxy, int $system, int $location, ?Server $server)
    {
        if (empty($moon)) {
            return false;
        }

        if (empty($galaxy) || empty($system) || empty($location)) {
            return false;
        }

        $planet = $this->planet::where('galaxy', $galaxy)
            ->where('sector', $system)
            ->where('place', $location)
            ->where('type', 'm')
            ->first();

        $player = $this->playerService->getPlayerById($playerId, $server);

        if (empty($player)) {
            return false;
        }

        if (!empty($planet)) {
            $planet->player_id = $player->id;
            $planet->type = 'm';
            $planet->data = Carbon::now();
            $planet->name = $moon;

            return $planet->save();
        }

        $planet = new Planet();
        $planet->player_id = $player->id;
        $planet->type = 'm';
        $planet->data = Carbon::now();
        $planet->galaxy = $galaxy;
        $planet->sector = $system;
        $planet->place = $location;
        $planet->name = $moon;

        return $planet->save();
    }

    public function updatePlayerPlanet($playerId, $name, int $galaxy, int $system, int $location, ?Server $server)
    {
        if (empty($galaxy) || empty($system) || empty($location)) {
            return false;
        }

        $planet = $this->planet::where('galaxy', $galaxy)
            ->where('sector', $system)
            ->where('place', $location)
            ->where('type', 'p')
            ->first();

        $player = $this->playerService->getPlayerById($playerId, $server);

        if (empty($player)) {
            return false;
        }

        if (!empty($planet)) {
            $planet->player_id = $player->id;
            $planet->type = 'p';
            $planet->data = Carbon::now();
            $planet->name = $name;

            return $planet->save();
        }

        $planet = new Planet();
        $planet->player_id = $player->id;
        $planet->type = 'p';
        $planet->data = Carbon::now();
        $planet->galaxy = $galaxy;
        $planet->sector = $system;
        $planet->place = $location;
        $planet->name = $name;

        return $planet->save();
    }

    public function getMoon($value)
    {
        $moonItem = $value->findOne('.moon_a');
        $moonAttributes = $moonItem->getAllAttributes();
        $moon = !empty($moonAttributes['data-moon-id']) ? $moonAttributes['data-moon-id'] : 0;

        return $moon;
    }

    public function removePlanet(int $galaxy, int $system, int $location)
    {
        if (empty($galaxy) || empty($system) || empty($location)) {
            return false;
        }

        $planets = $this->planet::where('galaxy', $galaxy)
            ->where('sector', $system)
            ->where('place', $location)
            ->get();

        if (!$planets->isEmpty()) {
            foreach ($planets as $planet) {
                $planet->delete();
            }
        }

        return true;
    }

    public function getPlayerStatus($class, $activeUser)
    {
        if (in_array('vacation_filter', $class)) {
            return 1;
        } elseif (in_array('inactive_filter', $class)) {
            return 2;
        } elseif (in_array('newbie_filter', $class)) {
            return 3;
        }

        $user = $activeUser->findOne('.status_abbr_honorableTarget');

        return $user->nodeValue != "" ? 5 : 4;
    }
}
