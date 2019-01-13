<?php

namespace App\Services;

use App\Modules\Flat;

class FlatService
{
    public function __construct(Flat $flat, ProcessService $processService)
    {
        $this->flat = $flat;
        $this->processService = $processService;
    }

    public function getFlats()
    {
        return $this->flat::orderBy('id', 'ASC')->get();
    }

    public function addFlat(array $data)
    {
        $item = new Flat();

        foreach ($data as $key => $val) {
            $item->$key = $val;
        }

        $status = $item->save();

        if ($status) {
            $this->sendNotification($item);
        }

        return $status;
    }

    public function sendNotification(Flat $flat)
    {
        $item = $this->flat::where('ad_id', '=', $flat->ad_id)
            ->where('id', '!=', $flat->id)
            ->orderBy('id', 'DESC')
            ->first();

        if (!empty($item) && $flat->price != $item->price) {
            $this->processService->addItem([
                'model_type' => Flat::class,
                'model_id' => $flat->id
            ]);
        }

        return true;
    }
}
