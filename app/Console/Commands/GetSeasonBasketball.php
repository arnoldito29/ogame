<?php

namespace App\Console\Commands;

use App\Modules\MatchGame;
use App\Modules\Planet;
use App\Services\ObjectLinkService;
use App\Services\TeamService;
use Illuminate\Console\Command;
use voku\helper\HtmlDomParser;

class GetSeasonBasketball extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:season-basketball {url} {--friday=} {--off=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get season';

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
        $url = $this->argument('url');
        $splitUrl = explode('-', $url);

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

        $list = [
            $splitUrl[1] . '-10',
            $splitUrl[1] . '-11',
            $splitUrl[1] . '-12',
            ((int) $splitUrl[1] + 1 ) . '-01',
            ((int) $splitUrl[1] + 1 ) . '-02',
            ((int) $splitUrl[1] + 1 ) . '-03',
            ((int) $splitUrl[1] + 1 ) . '-04',
        ];

        if ($this->option('friday')) {
            $list[] = ((int) $splitUrl[1] + 1 ) . '-05';
        }

        if (!$this->option('off')) {
            // Open the file using the HTTP headers set above
            foreach ($list as $value) {
                $this->getHtml($url, $value, $context);
            }
        } else {
            $this->getHtml($url, '', $context);
        }

        return true;
    }

    private function getCoff($listItem)
    {
        $classes = $listItem->getAttribute('class');
        $class = explode(" ", $classes);

        if (!in_array('colored', $class)) {
            return (float) $listItem->getAttribute('data-odd');
        }

        $coff = $listItem->first_child()->first_child()->innerHtml();
        $pattern = '/(["])/';
        $matches = preg_split($pattern, $coff);

        return (float) $matches[1];
    }

    private function getHtml(string $url, string $month, $context)
    {
        $data = file_get_contents($url . '&month=' . $month, false, $context);
        $html = HtmlDomParser::str_get_html($data);

        if ($html) {
            $session = $html->find('.wrap-section__header__title')->findOne('.tablet-desktop-only')->nodeValue;
            $list = $html->findOne('.js-tablebanner-t')->find('tr');
            foreach ($list as $key => $listItem) {
                if ($key === 0) {
                    continue;
                }
                $matchNodeValue = $listItem->findOne('.h-text-left');
                $matchUrl = 'https://www.betexplorer.com' . $matchNodeValue->findOne('a')->getAttribute('href');
                $match = $matchNodeValue->nodeValue;
                $match = explode(' - ', $match);
                $resultField = $listItem->findOne('.h-text-center')->nodeValue;
                $splitResult = explode(' ', $resultField);
                $overTime = (count($splitResult) > 1);
                $result = explode(':', $splitResult[0]);
                $coffList = $listItem->find('.table-main__odds');
                if (!isset($coffList[0])) {
                    continue;
                }
                $date = $this->getDate($listItem->findOne('.h-text-right')->nodeValue);
                $coff1 = $this->getCoff($coffList[0]);
                $coff2 = $this->getCoff($coffList[1]);

                $this->addMatch($session, $match, $result, $overTime, $coff1, $coff2, $date, $matchUrl);
            }
        }

        return true;
    }

    private function getDate($dateValue)
    {
        $dateList = explode('.', $dateValue);
        $y = !empty($dateList[2]) ? $dateList[2] : date('Y');

        return $y . '.' . $dateList[1] . '.' . $dateList[0];
    }

    private function addMatch($session, $match, $result, $overTime, $coff1, $coff2, $date, $matchUrl)
    {
        $team1 = $this->teamService->checkTeam($match[0], $session);
        $team2 = $this->teamService->checkTeam($match[1], $session);

        if (!isset($result[1])) {
            return false;
        }

        MatchGame::create([
            'team_id1' => $team1->id,
            'team_id2' => $team2->id,
            'team_result_1' => $result[0],
            'team_result_2' => $result[1],
            'overtime' => $overTime,
            'detail' => $date . '-' . $matchUrl,
            'coff1' => $coff1,
            'coff2' => $coff2,
        ]);
    }
}
