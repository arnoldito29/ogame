<?php

namespace App\Services;

use App\Modules\Team;

class TeamService
{
    public function __construct(Team $team)
    {
        $this->team = $team;
    }
}
