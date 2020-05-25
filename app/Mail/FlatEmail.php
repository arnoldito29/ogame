<?php

namespace App\Mail;

use App\Modules\flat;
use App\Modules\Process;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class FlatEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Process $process, Collection $other)
    {
        $this->flat = $process->model;
        $this->other = $other;
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
            ->subject($this->flat->name . ' pasikeite')
            ->markdown('emails.flat')
            ->with([
                'name' => $this->flat->name,
                'size' => $this->flat->size,
                'id' => $this->flat->ad_id,
                'price' => $this->flat->price,
                'link' => $this->flat->link,
                'diff' => $this->flat->getDiff(),
                'other' => $this->other,
            ]);
    }
}
