<?php

namespace App\Services;

use App\Modules\Player;

class PlayerService
{
    public function __construct(Player $player)
    {
        $this->player = $player;
        $this->players = $this->getPlayersByName();
        $this->playersIds = $this->getPlayersById();
    }

    public function getPlayersByName()
    {
        $players = $this->player::orderBy('id')
            ->get()->pluck('id', 'name')
            ->toArray();

        return $players;
    }

    public function getPlayersById()
    {
        $players = $this->player::orderBy('id')
            ->get()->pluck('id', 'ogame_id')
            ->toArray();

        return $players;
    }

    public function getPlayerById($playerId)
    {
        if (empty($playerId)) {
            return null;
        }

        $player = $this->player::where('ogame_id', $playerId)->first();

        return $player;
    }

    public function getPlayerId($playerName, $playerId)
    {
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
        $player->unit = 1;
        $player->save();

        return $player->id;
    }

    public function updatePlayerStatus($playerId, $status)
    {
        $player = $this->getPlayerById($playerId);

        if (empty($player)) {
            return false;
        }

        $player->status = $status;

        return $player->save();
    }
}
