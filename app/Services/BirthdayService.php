<?php

namespace App\Services;

use App\Modules\Birthday;
use App\Modules\Menu;

class BirthdayService
{
    public function __construct(Birthday $birthday)
    {
        $this->birthday = $birthday;
    }

    public function getBirthdays()
    {
        return $this->birthday::orderBy('name', 'ASC')->get();
    }

    public function addItem(array $requestDsta)
    {
        $item = new Birthday();
        $item->name = $requestDsta['name'];
        $item->birthday = $requestDsta['birthday'];

        return $item->save();
    }

    public function updateItem(Birthday $item, array $requestDsta)
    {
        $item->name = $requestDsta['name'];
        $item->birthday = $requestDsta['birthday'];

        return $item->save();
    }
}
