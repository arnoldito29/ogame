<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Services\TeamService;
use Illuminate\Console\Command;

class MatchEqualTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:match-equal-test';

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
        $split = 'team_result';

        $teams = $this->teamService->team::where('id', '<', 33)->get();
        //$teams = $this->teamService->team::where('id', '>', 95)->get();
        $total = 0;
        $sum2 = 0;
        foreach ($teams as $team) {
            $match = MatchGame::where('team_id1', $team->id)->orWhere('team_id2', $team->id)->orderBy('detail', 'ASC')->get();
            $overtime = 1;
            foreach ($match as $matchItem) {
                $team1 = $split . '_1';
                $team2 = $split . '_2';
                if ($matchItem->overtime) {
                    $overtime = 1;
                    continue;
                } else {
                    $sum = $matchItem->$team1 + $matchItem->$team2;
                    $left = $sum % 2;
                    if ($left === 0) {
                        $overtime = 1;
                        continue;
                    } else {
                        $overtime = $overtime * 1.7;

                        if ($overtime > 5) {
                            $total += $overtime;
                            $overtime = 1;
                        }
                    }
                }
            }

            $this->showInfo('team: '. $team->id. ' total: ' . $total);
        }

        $this->showInfo('total: ' . $total);
        $this->showInfo('super: ' . $this->super);

        return true;
    }

    public function addSum($overtime)
    {
        $sum = 1;
        for($i = 0; $i <= $overtime; $i++) {
            $sum *= 1.7;
        }

        return $sum;
    }

    public function showInfo($overtime)
    {
        if ($overtime > 5) {
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
