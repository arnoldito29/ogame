<?php

namespace App\Http\Controllers\Admin;

use App\Services\OgameStatService;
use Illuminate\Http\Request;

class OgameController extends AdminPanelController
{
    public function __construct(OgameStatService $ogameStatService)
    {
        $this->ogameStatService = $ogameStatService;
    }

    public function create()
    {
        return view($this->prefix . 'ogame.add');
    }

    public function store(Request $request)
    {
        $this->ogameStatService->statsPoints($request->all());

        return redirect()->route('ogame.add');
    }
}
