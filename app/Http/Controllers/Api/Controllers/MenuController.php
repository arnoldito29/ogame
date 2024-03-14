<?php

namespace App\Http\Controllers\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function getMenu(Request $request)
    {
        $menu = $this->menuService->getMenu();

        return MenuResource::collection($menu);
    }
}
