<?php

namespace App\Http\Controllers\Admin;

use App\Services\BirthdayService;
use Illuminate\Http\Request;

class BirthdayController extends AdminPanelController
{
    public function __construct(BirthdayService $birthdayService)
    {
        $this->birthdayService = $birthdayService;
    }

    public function index()
    {
        $list = $this->birthdayService->getBirthdays();

        return view($this->prefix . 'birthdays.index', compact('list'));
    }
}
