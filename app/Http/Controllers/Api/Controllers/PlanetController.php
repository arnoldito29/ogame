<?php

namespace App\Http\Controllers\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PlanetService;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    public function __construct(PlanetService $planetService)
    {
        $this->planetService = $planetService;
    }

    public function galaxy(Request $request)
    {
        $requestData = $request->all();
        $status = $this->planetService->setGalaxy($requestData);

        return ['success' => $status];
    }
}
