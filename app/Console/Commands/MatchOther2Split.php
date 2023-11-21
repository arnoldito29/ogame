<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Services\TeamService;
use Illuminate\Console\Command;

class MatchOther2Split extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:match-other2-split {split}';

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
        $split2 = $this->getSplit2();

        $teams = $this->teamService->team::where('id', '>', '126')->where('id', '<', '1570')->get();
        $total = 0;
        foreach ($teams as $team) {
            $match = MatchGame::where('team_id1', $team->id)->orWhere('team_id2', $team->id)->orderBy('detail', 'ASC')->get();
            $overtime = 0;
            $result = [];
            foreach ($match as $matchItem) {
                $split11 = $split . '_1';
                $split12 = $split . '_2';
                $split21 = $split2 . '_1';
                $split22 = $split2 . '_2';
                $team1 = $matchItem->$split11 + $matchItem->$split21;
                $team2 = $matchItem->$split12 + $matchItem->$split22;

                if ($matchItem->coff1 > $matchItem->coff2 && $team1 >= $team2) {
                    $this->showInfo($overtime);
                    $this->printResult($result, $overtime);
                    $overtime = 0;
                    $total++;
                    $result = [];
                } else if ($matchItem->coff1 <= $matchItem->coff2 && $team1 <= $team2) {
                    $this->showInfo($overtime);
                    $this->printResult($result, $overtime);
                    $overtime = 0;
                    $total++;
                    $result = [];
                } else {
                    $overtime++;
                    $result[] = [
                        'coff' => $matchItem->coff1,
                        'coff2' => $matchItem->coff2,
                        'res' => $team1,
                        'res2' => $team2,
                    ];
                    if ($team->id == 279) {
                        //dump($result);
                    }
                }
            }

            $this->showInfo($overtime);
            $this->showInfo('team: '. $team->id. ' total: ' . $total);
        }

        $this->showInfo('total: ' . $total);

        return true;
    }

    public function printResult($result, $overtime)
    {
        if ($overtime < 13) {
            return '';
        }

        foreach ($result as $value) {
            $this->showInfo('coff: '. $value['coff']. ' coff2: ' . $value['coff2']. ' res: ' . $value['res']. ' ress2: ' . $value['res2']);
        }
    }

    public function showInfo($overtime)
    {
        if ($overtime > 12) {
            $this->info($overtime);
        }
    }

    public function getSplit()
    {
        $arg = $this->argument('split');
        $arg = (int) $arg * 2 - 1;

        return 'team_result_qt' . $arg;
    }

    public function getSplit2()
    {
        $arg = $this->argument('split');
        $arg = (int) $arg * 2;


        return 'team_result_qt' . $arg;
    }
}
