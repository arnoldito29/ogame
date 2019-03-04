<?php

namespace App\Services;

use App\Modules\OgameStat;
use voku\helper\HtmlDomParser;

class OgameStatService
{
    public function __construct(OgameStat $ogameStat)
    {
        $this->ogameStat = $ogameStat;
    }

    public function statsPoints(array $requestData)
    {
        $html = HtmlDomParser::str_get_html($requestData['data']);

        dd($html);
        return true;
    }
}
