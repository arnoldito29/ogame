<?php

namespace App\Helpers;

class Helper
{
    public static function getPriceDiff($first, $second)
    {
        $percent = round($second * 100 / $first, 2);

        return $percent - 100;
    }
}
