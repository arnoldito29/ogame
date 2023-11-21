<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Modules\Planet;
use App\Services\ObjectLinkService;
use App\Services\TeamService;
use Illuminate\Console\Command;
use voku\helper\HtmlDomParser;

class GoalBasketball extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:goal-basketball';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get goal';

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
        $opts = array(
            'http' => array(
                'method'    => 'GET',
                'user-agent'=> 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36',
                'header' => "Host: www.betexplorer.com\r\n" .
                    "User-Agent: PostmanRuntime/7.32.3\r\n" .
                    "Cookie: foo=bar\r\n"
            )
        );

        $context = stream_context_create($opts);
        $list = MatchGame::whereNull('team_result_qt1_1')->get();

        // Open the file using the HTTP headers set above
        foreach ($list as $value) {
            $detail = explode("-", $value->detail, 2);
            $this->getHtml($detail[1], $context, $value);
        }

        return true;
    }

    private function getHtml(string $url, $context, $value)
    {
        $data = file_get_contents($url, false, $context);
        $html = HtmlDomParser::str_get_html($data);

        if ($html) {
            $score = $html->findOne('.list-details__item__partial')->nodeValue;
            $fullScore = preg_split('/([(,)])/', $score);
            $score1 = explode(":", $fullScore[1]);
            $score2 = explode(":", $fullScore[2]);
            $score3 = explode(":", $fullScore[3]);
            $score4 = explode(":", $fullScore[4]);

            $this->update($value, trim($score1[0]), trim($score1[1]), trim($score2[0]), trim($score2[1]), trim($score3[0]), trim($score3[1]), trim($score4[0]), trim($score4[1]));

        }

        return true;
    }

    private function update($value, $score1, $score2, $score3, $score4, $score5, $score6, $score7, $score8)
    {
        $value->team_result_qt1_1 = $score1;
        $value->team_result_qt1_2 = $score2;
        $value->team_result_qt2_1 = $score3;
        $value->team_result_qt2_2 = $score4;
        $value->team_result_qt3_1 = $score5;
        $value->team_result_qt3_2 = $score6;
        $value->team_result_qt4_1 = $score7;
        $value->team_result_qt4_2 = $score8;

        $value->save();
    }
}
