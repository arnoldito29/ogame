<?php

namespace App\Services;

use App\Modules\Menu;

class MenuService
{
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function getMenu()
    {
        return $this->menu::orderBy('order', 'ASC')->get();
    }
}
