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
}
