<?php

namespace App\Http\Controllers\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OgameStatService;
use Illuminate\Http\Request;

class OgameStatController extends Controller
{
    public function __construct(OgameStatService $ogameStatService)
    {
        $this->ogameStatService = $ogameStatService;
    }


}
