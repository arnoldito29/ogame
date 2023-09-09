<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Services\TeamService;
use Illuminate\Console\Command;

class MatchList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:match';

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
    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $teams = $this->teamService->team::all();
        foreach ($teams as $team) {
            $match = MatchGame::where('team_id1', $team->id)->orWhere('team_id2', $team->id)->get();
            $overtime = 0;
            foreach ($match as $matchItem) {
                if (!$matchItem->overtime) {
                    $overtime++;
                } else {
                   $this->showInfo($overtime);
                   $overtime = 0;
                }
            }

            $this->showInfo($overtime);
        }

        return true;
    }

    public function showInfo($overtime)
    {
        if ($overtime > 12) {
            $this->info($overtime);
        }
    }
}
