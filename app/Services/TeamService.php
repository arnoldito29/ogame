<?php

namespace App\Services;

use App\Modules\Team;

class TeamService
{
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function getTeam(string $name, string $type)
    {
        return $this->team::where('name', $name)->where('type', $type)->first();
    }

    public function checkTeam(string $name, string $type)
    {
        $team = $this->getTeam($name, $type);
        if ($team) {
            return $team;
        }

        return $this->team::create([
            'name' => $name,
            'type' => $type,
        ]);
    }
}
