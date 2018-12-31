<?php

namespace App\Mail;

use App\Modules\Birthday;
use App\Modules\Process;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BirthdayEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Process $process)
    {
        $this->birthday = $process->model;
        $this->config = config('mail');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->config['from']['address'])
            ->subject($this->birthday->name . ' birthday')
            ->markdown('emails.birthday')
            ->with([
                'name' => $this->birthday->name,
                'birthday' => $this->birthday->birthday,
                'years' => $this->birthday->getYears(),
            ]);
    }
}
