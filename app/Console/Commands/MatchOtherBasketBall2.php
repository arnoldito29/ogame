<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Services\TeamService;
use Illuminate\Console\Command;

class MatchOtherBasketBall2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:match-other-basketball2';

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

        $teams = $this->teamService->team::where('id', '>', '282')->where('id', '<', '1760')->get();
        $total = 0;
        foreach ($teams as $team) {
            $match = MatchGame::where('team_id1', $team->id)->orWhere('team_id2', $team->id)->orderBy('detail', 'ASC')->get();
            $overtime = 0;
            $sum = 0;
            foreach ($match as $matchItem) {
                $team1 = $split . '_1';
                $team2 = $split . '_2';
                $min = $matchItem->coff1 > $matchItem->coff2 ? $matchItem->coff2 : $matchItem->coff1;
                $sum = $this->getSum($min, $sum, $overtime);
                if ($matchItem->coff1 > $matchItem->coff2 && $matchItem->$team1 < $matchItem->$team2) {
                    $this->showInfo($overtime);
                    //$this->showInfo2($sum);
                    $overtime = 0;
                    $sum = 0;
                    $total++;
                } else if ($matchItem->coff1 <= $matchItem->coff2 && $matchItem->$team1 > $matchItem->$team2) {
                    $this->showInfo($overtime);
                    //$this->showInfo2($sum);
                    $overtime = 0;
                    $sum = 0;
                    $total++;
                } else {
                    $overtime++;
                }
            }

            $this->showInfo($overtime);
            $this->showInfo2($sum);
            $this->showInfo('team: '. $team->id. ' total: ' . $total);
        }

        $this->showInfo('total: ' . $total);

        return true;
    }

    public function showInfo($overtime)
    {
        if ($overtime > 2) {
            $this->info($overtime);
        }
    }

    public function showInfo2($overtime)
    {
        if ($overtime > 20) {
            $this->info($overtime);
        }
    }

    public function getSplit()
    {
        $arg = $this->argument('split');

        return 'team_result_qt' . $arg;
    }

    public function getSum($min, $sum, $overtime)
    {
        $total = $overtime * 0.1 + 0.1 + $sum;
        $result = round($total / ($min - 1), 2);

        return $result <= 0.15 ? 0.15 : $result;
    }
}
