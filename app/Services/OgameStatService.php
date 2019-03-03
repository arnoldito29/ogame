<?php

namespace App\Services;

use App\Modules\OgameStat;

class OgameStatService
{
    public function __construct(OgameStat $ogameStat)
    {
        $this->ogameStat = $ogameStat;
    }
}
