<?php

namespace App\Services;

use App\Modules\Player;

class PlayerService
{
    public function __construct(Player $player)
    {
        $this->player = $player;
    }
}
