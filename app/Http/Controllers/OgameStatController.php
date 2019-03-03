<?php

namespace App\Http\Controllers;

use App\Services\OgameStatService;
use Illuminate\Http\Request;

class OgameStatController extends Controller
{
    public function __construct(OgameStatService $ogameStatService)
    {
        $this->ogameStatService = $ogameStatService;
    }
}
