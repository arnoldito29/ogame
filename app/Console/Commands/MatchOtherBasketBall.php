<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Services\TeamService;
use Illuminate\Console\Command;

class MatchOtherBasketBall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:match-other-basketball';

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
        $split = 'team_result';

        $teams = $this->teamService->team::get();
        $total = 0;
        foreach ($teams as $team) {
            $match = MatchGame::where('team_id1', $team->id)->orWhere('team_id2', $team->id)->orderBy('detail', 'ASC')->get();
            $overtime = 0;
            foreach ($match as $matchItem) {
                $team1 = $split . '_1';
                $team2 = $split . '_2';
                if ($matchItem->coff1 > $matchItem->coff2 && $matchItem->$team1 > $matchItem->$team2) {
                    $this->showInfo($overtime);
                    //$this->printResult($result, $overtime);
                    $overtime = 0;
                    $total++;
                    $result = [];
                } else if ($matchItem->coff1 <= $matchItem->coff2 && $matchItem->$team1 < $matchItem->$team2) {
                    $this->showInfo($overtime);
                    //$this->printResult($result, $overtime);
                    $overtime = 0;
                    $total++;
                    $result = [];
                } else {
                    $overtime++;
                    $result[] = [
                        'coff' => $matchItem->coff1,
                        'coff2' => $matchItem->coff2,
                        'res' => $matchItem->$team1,
                        'res2' => $matchItem->$team2,
                        'over' => $matchItem->overtime,
                    ];
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
        if ($overtime > 1) {
            $this->info($overtime);
        }
    }

    public function getSplit()
    {
        $arg = $this->argument('split');

        return 'team_result_qt' . $arg;
    }

    public function printResult($result, $overtime)
    {
        if ($overtime < 11) {
            return '';
        }

        foreach ($result as $value) {
            $this->showInfo('coff: '. $value['coff']. ' coff2: ' . $value['coff2']. ' res: ' . $value['res']. ' ress2: ' . $value['res2']. ' over: ' . $value['over']);
        }
    }
}
