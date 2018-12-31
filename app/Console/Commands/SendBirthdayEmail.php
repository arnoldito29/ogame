<?php

namespace App\Console\Commands;

use App\Services\BirthdayService;
use Illuminate\Console\Command;

class SendBirthdayEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birthday-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthday email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BirthdayService $birthdayService)
    {
        $this->birthdayService = $birthdayService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->birthdayService->setEmail();

        return true;
    }
}
