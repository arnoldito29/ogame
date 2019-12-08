<?php

namespace App\Services;

use App\Modules\Player;
use App\Modules\Server;

class PlayerService
{
    public function __construct(Player $player)
    {
        $this->player = $player;
        $this->players = [];
        $this->playersIds = [];
    }

    public function getPlayersByName($server)
    {
        $players = $this->player::where('unit', $server->id)
            ->orderBy('id')
            ->get()->pluck('id', 'name')
            ->toArray();

        return $players;
    }

    public function getPlayersById($server)
    {
        $players = $this->player::where('unit', $server->id)
            ->orderBy('id')
            ->get()->pluck('id', 'ogame_id')
            ->toArray();

        return $players;
    }

    public function getPlayerById($playerId, ?Server $server)
    {
        if (empty($playerId)) {
            return null;
        }

        $serverId = !empty($server) ? $server->id : 1;
        $player = $this->player::where('ogame_id', $playerId)->where('unit', $serverId)->first();

        return $player;
    }

    public function getPlayerId($playerName, $playerId, ?Server $server)
    {
        if (empty($this->playersIds)) {
            $this->playersIds = $this->getPlayersById($server);
        }

        if (empty($this->players)) {
            $this->players = $this->getPlayersByName($server);
        }

        if (!empty($this->playersIds[$playerId])) {
            return $this->playersIds[$playerId];
        }

        if (!empty($this->players[$playerName])) {
            $player = $this->player::find($this->players[$playerName]);
            $player->ogame_id = $playerId;
            $player->save();

            return $this->players[$playerName];
        }

        $player = new Player();
        $player->name = $playerName;
        $player->ogame_id = $playerId;
        $player->status = 0;
        $player->unit = $server->id;
        $player->save();

        return $player->id;
    }

    public function updatePlayerStatus($playerId, $status, ?Server $server)
    {
        $player = $this->getPlayerById($playerId, $server);

        if (empty($player)) {
            return false;
        }

        $player->status = $status;

        return $player->save();
    }
}
