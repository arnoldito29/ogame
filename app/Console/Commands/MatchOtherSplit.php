<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Services\TeamService;
use Illuminate\Console\Command;

class MatchOtherSplit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:match-other-split {split}';

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
        $split = $this->getSplit();

        $teams = $this->teamService->team::where('id', '>', '126')->where('id', '<', '1570')->get();
        $total = 0;
        foreach ($teams as $team) {
            $match = MatchGame::where('team_id1', $team->id)->orWhere('team_id2', $team->id)->orderBy('detail', 'ASC')->get();
            $overtime = 0;
            foreach ($match as $matchItem) {
                $team1 = $split . '_1';
                $team2 = $split . '_2';
                if ($matchItem->coff1 > $matchItem->coff2 && $matchItem->$team1 > $matchItem->$team2) {
                    $this->showInfo($overtime);
                    $overtime = 0;
                    $total++;
                } else if ($matchItem->coff1 <= $matchItem->coff2 && $matchItem->$team1 < $matchItem->$team2) {
                    $this->showInfo($overtime);
                    $overtime = 0;
                    $total++;
                } else {
                    $overtime++;
                    //$this->showInfo('coff: '. $matchItem->coff1. ' coff2: ' . $matchItem->coff2. ' res: ' . $matchItem->$team1. ' ress2: ' . $matchItem->$team2. ' over: ' . $matchItem->overtime);
                }
            }

            $this->showInfo($overtime);
            $this->showInfo('team: '. $team->id. ' total: ' . $total);
        }

        $this->showInfo('total: ' . $total);

        return true;
    }

    public function showInfo($overtime)
    {
        if ($overtime > 11) {
            $this->info($overtime);
        }
    }

    public function getSplit()
    {
        $arg = $this->argument('split');

        return 'team_result_qt' . $arg;
    }
}
