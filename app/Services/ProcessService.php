<?php

namespace App\Services;

use App\Modules\Process;
use Illuminate\Support\Facades\Mail;
use App\Mail\BirthdayEmail;

class ProcessService
{
    public function __construct(Process $process)
    {
        $this->process = $process;
        $this->config = config('mail');
    }

    public function getProcess()
    {
        return $this->birthday::orderBy('create_at', 'ASC')->get();
    }

    public function addItem(array $requestDsta)
    {
        $oldItem = $this->process::where('sent', 0);

        foreach ($requestDsta as $key => $value) {
            $oldItem = $oldItem->where($key, $value);
        }

        if (!empty($oldItem->first())) {
            return false;
        }

        $item = new Process();
        $item->model_type = $requestDsta['model_type'];
        $item->model_id = $requestDsta['model_id'];
        $item->sent = 0;

        return $item->save();
    }

    public function sendMail()
    {
        $items = $this->process::with('model')->where('sent', 0)->get();

        foreach ($items as $item) {
            $class = $item->getName();

            switch ($class) {
                case 'Birthday':
                    Mail::to($this->config['default'])->send(new BirthdayEmail($item));
                    break;
            }

            $item->sent = 1;
            $item->save();
        }
    }
}
