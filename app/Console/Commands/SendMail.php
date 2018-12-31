<?php

namespace App\Console\Commands;

use App\Services\ProcessService;
use Illuminate\Console\Command;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProcessService $processService)
    {
        $this->processService = $processService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->processService->sendMail();

        return true;
    }
}
