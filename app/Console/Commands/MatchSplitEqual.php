<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Services\TeamService;
use Illuminate\Console\Command;

class MatchSplitEqual extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:match-split-equal {split}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get object';
    protected $super = 0;

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
        $split = $this->getSplit();

        $teams = $this->teamService->team::where('id', '<', 330)->get();
        $total = 0;
        foreach ($teams as $team) {
            $match = MatchGame::where('team_id1', $team->id)->orWhere('team_id2', $team->id)->orderBy('detail', 'ASC')->get();
            $overtime = 0;
            foreach ($match as $matchItem) {
                $team1 = $split . '_1';
                $team2 = $split . '_2';
                $sum = $matchItem->$team1 + $matchItem->$team2;
                $left = $sum % 2;
                if ($left === 0) {
                    $overtime++;
                } else {
                    $this->showInfo($overtime);
                    $overtime = 0;
                    $total++;
                }
            }

            $this->showInfo($overtime);
            $this->showInfo('team: '. $team->id. ' total: ' . $total);
        }

        $this->showInfo('total: ' . $total);
        $this->showInfo('super: ' . $this->super);

        return true;
    }

    public function showInfo($overtime)
    {
        if ($overtime > 8) {
            $this->info($overtime);
            $this->super++;
        }
    }

    public function getSplit()
    {
        $arg = $this->argument('split');

        return 'team_result_qt' . $arg;
    }
}
