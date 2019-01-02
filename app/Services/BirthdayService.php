<?php

namespace App\Services;

use App\Modules\Birthday;
use Carbon\Carbon;

class BirthdayService
{
    public function __construct(Birthday $birthday, ProcessService $processService)
    {
        $this->birthday = $birthday;
        $this->processService = $processService;
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

    public function setEmail()
    {
        $date = Carbon::now()->addDay(1)->format('-m-d');

        $items = $this->birthday::where('birthday', 'like', '%' . $date)->get();

        if ($items->count() > 0) {
            foreach ($items as $item) {
                $this->processService->addItem([
                    'model_type' => Birthday::class,
                    'model_id' => $item->id
                ]);
            }
        }
    }
}
