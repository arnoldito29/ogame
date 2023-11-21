<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Services\TeamService;
use Illuminate\Console\Command;

class MatchTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:match-test';

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
        foreach ($teams as $team) {
            $match = MatchGame::where('team_id1', $team->id)->orWhere('team_id2', $team->id)->orderBy('detail', 'ASC')->get();
            $overtime = 0;
            $checkDate = '';
            foreach ($match as $matchItem) {
                $date = explode('-', $matchItem->detail);
                $format = explode('.', $date[0]);
                if (empty($checkDate)) {
                    $checkDate = $format[0] . '-' . $format[1] . '-' . $format[2];
                    continue;
                }

                $date1=date_create($checkDate);
                $date2=date_create($format[0] . '-' . $format[1] . '-' . $format[2]);
                $diff=date_diff($date1,$date2);
                if ($diff->format("%a") == 1) {
                    $this->showInfo($matchItem->id);
                }

                $checkDate = $format[0] . '-' . $format[1] . '-' . $format[2];
                $this->showInfo('total: ' . $checkDate);
            }
dd();
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
