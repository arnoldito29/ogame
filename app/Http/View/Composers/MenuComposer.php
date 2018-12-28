<?php

namespace App\Http\View\Composers;

use App\Services\MenuService;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * @var MenuService
     */
    protected $menuService;

    /**
     * MenuComposer constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menu', $this->menuService->getMenu());
    }
}
