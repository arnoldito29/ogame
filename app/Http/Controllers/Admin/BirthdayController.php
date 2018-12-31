<?php

namespace App\Http\Controllers\Admin;

use App\Modules\Birthday;
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

    public function create()
    {
        return view($this->prefix . 'birthdays.create');
    }

    public function store(Request $request)
    {
        $this->birthdayService->addItem($request->all());

        return redirect()->route('birthdays.index');
    }

    public function edit(Birthday $birthday)
    {
        return view($this->prefix . 'birthdays.update', compact('birthday'));
    }

    public function update(Birthday $birthday, Request $request)
    {
        $this->birthdayService->updateItem($birthday, $request->all());

        return redirect()->route('birthdays.index');
    }

    public function destroy(Birthday $birthday)
    {
        $status = $birthday->delete();

        return response()->json(['status' => !empty($status)]);
    }
}
