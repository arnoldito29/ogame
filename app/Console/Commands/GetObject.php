<?php

namespace App\Console\Commands;

use App\Services\ObjectLinkService;
use Illuminate\Console\Command;

class GetObject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:object';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get object';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ObjectLinkService $objectLinkService)
    {
        $this->objectLinkService = $objectLinkService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$this->objectLinkService->getObjectLinks();

        return true;
    }
}
