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

    public function statsPoints(Request $request)
    {
        $requestData = $request->all();
        $requestData['type'] = 1;
        $status = $this->ogameStatService->statsPoints($requestData);

        return ['success' => $status];
    }

    public function statsEconomy(Request $request)
    {
        $requestData = $request->all();
        $requestData['type'] = 2;
        $status = $this->ogameStatService->statsPoints($requestData);

        return ['success' => $status];
    }

    public function statsReseach(Request $request)
    {
        $requestData = $request->all();
        $requestData['type'] = 3;
        $status = $this->ogameStatService->statsPoints($requestData);

        return ['success' => $status];
    }

    public function statsMilitary(Request $request)
    {
        $requestData = $request->all();
        $requestData['type'] = 4;
        $status = $this->ogameStatService->statsPoints($requestData);

        return ['success' => $status];
    }

    public function galexy(Request $request)
    {
        $requestData = $request->all();
        $requestData['type'] = 4;
        $status = $this->ogameStatService->statsPoints($requestData);

        return ['success' => $status];
    }
}
