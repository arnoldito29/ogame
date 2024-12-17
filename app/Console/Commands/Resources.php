<?php

namespace App\Console\Commands;

use App\Services\ResourceService;
use Illuminate\Console\Command;

class Resources extends Command
{
    const SPEED = 10;

    const MULTI = [
        'plasma',
    ];

    private $colonies = [];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:resources';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Total resources';

    public function __construct(ResourceService $resourceService)
    {
        $this->resourceService = $resourceService;
        $this->colonies = $this->getColonies();
        parent::__construct();
    }

    private function getColonies($powerAdd = 0, $metalAdd = 0, $crystalAdd = 0, $deuteriumAdd = 0)
    {
        $this->colonies = $this->resourceService->getColonies($powerAdd, $metalAdd, $crystalAdd, $deuteriumAdd);

        return $this->colonies;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $total = $this->build($this->colonies, true);
        $colonies = $this->getColonies();
        $cost = $this->updateColonies($colonies, 'metal');
        $new = $this->build($colonies);
        $this->info('metal atsiperka: ' . ($cost/($new - $total)));
        //$this->info('metal atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = $this->getColonies();
        $cost = $this->updateColonies($colonies, 'crystal');
        $new = $this->build($colonies);
        $this->info('crystal atsiperka: ' . ($cost/($new - $total)));
        //$this->info('crystal atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = $this->getColonies();
        $cost = $this->updateColonies($colonies, 'deuterium');
        $new = $this->build($colonies);
        $this->info('deuterium atsiperka: ' . ($cost/($new - $total)));
        //$this->info('deuterium atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = $this->getColonies();
        $cost = $this->updateColonies($colonies, 'plasma');
        $new = $this->build($colonies);
        $this->info('plasma atsiperka: ' . ($cost/($new - $total)));
        //$this->info('plasma atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = $this->getColonies();
        $cost = $this->updateColonies($colonies, 'magma');
        $new = $this->build($colonies);
        $this->info('magma atsiperka: ' . ($cost/($new - $total)));
        //$this->info('magma atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = $this->getColonies(1);
        $cost = $this->updateColonies($colonies, 'power', true);
        $new = $this->build($colonies);
        $this->info('power atsiperka: ' . ($cost/($new - $total)));
        //$this->info('power atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = $this->getColonies(0, 1);
        $cost = $this->updateColonies($colonies, 'metalAdd', true);
        $new = $this->build($colonies);
        $this->info('metal add atsiperka: ' . ($cost/($new - $total)));
        //$this->info('metal add atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = $this->getColonies(0, 0, 1);
        $cost = $this->updateColonies($colonies, 'crystalAdd', true);
        $new = $this->build($colonies);
        $this->info('crystal add atsiperka: ' . ($cost/($new - $total)));
        //$this->info('crystal add atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = $this->getColonies(0, 0, 0, 1);
        $cost = $this->updateColonies($colonies, 'deuteriumAdd', true);
        $new = $this->build($colonies);
        $this->info('deuterium add atsiperka: ' . ($cost/($new - $total)));
        //$this->info('deuterium add atsiperka 24: ' . (($cost/($new - $total))/24));
    }

    private function updateColonies(array &$colonies, string $update, $skip = false)
    {
        $cost = 0;

        if ($skip) {
            $price = [
                'metal' => 0,
                'crystal' => 0,
                'deuterium' => 0,
            ];
            switch ($update) {
                case 'power';
                    $price = [
                        'metal' => 25624901,
                        'crystal' => 20499921,
                        'deuterium' => 10249960,
                    ];
                    break;
                case 'metalAdd';
                    $price = [
                        'metal' => 3824401,
                        'crystal' => 1799718,
                        'deuterium' => 1574753,
                    ];
                    break;
                case 'crystalAdd';
                    $price = [
                        'metal' => 1012341,
                        'crystal' => 1687235,
                        'deuterium' => 674694,
                    ];
                    break;
                case 'deuteriumAdd';
                    $price = [
                        'metal' => 2024683,
                        'crystal' => 1349789,
                        'deuterium' => 674694,
                    ];
                    break;
            }

            return $this->convert($price['metal'], $price['crystal'], $price['deuterium']);
        }

        foreach ($colonies as $key => $colony) {
            $colonies[$key][$update] = $colony[$update] + 1;
            $price = $this->getPrice($colonies[$key][$update], $update);

            $cost = in_array($update, self::MULTI) ? $price : $cost + $price;
        }

        return $cost;
    }

    private function getPrice(int $level, string $update)
    {
        $result = [];
        switch ($update) {
            case 'metal':
                $result = [
                    'metal' => 60 * pow(1.5, ($level - 1)),
                    'crystal' => 15 * pow(1.5, ($level - 1)),
                    'deuterium' => 0,
                ];
                break;
            case 'crystal':
                $result = [
                    'metal' => 48 * pow(1.6, ($level - 1)),
                    'crystal' => 24 * pow(1.6, ($level - 1)),
                    'deuterium' => 0,
                ];
                break;
            case 'deuterium':
                $result = [
                    'metal' => 225 * pow(1.5, ($level - 1)),
                    'crystal' => 75 * pow(1.5, ($level - 1)),
                    'deuterium' => 0,
                ];
                break;
            case 'plasma':
                $result = [
                    'metal' => 2000 * pow(2, ($level - 1)),
                    'crystal' => 4000 * pow(2, ($level - 1)),
                    'deuterium' => 1000 * pow(2, ($level - 1)),
                ];
                break;
            case 'magma':
                $result = [
                    'metal' => 35914449,
                    'crystal' => 28731560,
                    'deuterium' => 3591444,
                ];
        }

        if (empty($result)) {
            return 0;
        }

        return $this->convert((int) $result['metal'],(int) $result['crystal'],(int) $result['deuterium']);
    }

    /**
     * Execute the console command.
     */
    public function build(array $colonies, bool $show = false)
    {
        $result = [];
        foreach ($colonies as $colony) {
			$metalAdd = $this->metalTotal($colony);
			$crystalAdd = $this->crystalTotal($colony);
			$deuteriumAdd = $this->deuteriumTotal($colony);
            $result[] = [
                'name' => $colony['name'] .' ',
                'metal' => $metalAdd,
                'crystal' => $crystalAdd,
                'deuterium' => $deuteriumAdd,
				'suma' => $this->convert($metalAdd, $crystalAdd, $deuteriumAdd),
            ];
        }
        $metal = 0;
        $crystal = 0;
        $deuterium = 0;
        foreach ($result as $value) {
			$metal += round($value['metal'] * 24, 3);
			$crystal += round($value['crystal'] * 24, 3);
			$deuterium += round($value['deuterium'] * 24, 3);
            $info = "planet: %s, metal: %s, crystal: %s, deuterium: %s, suma: %s";
            if ($show) {
                $this->info(sprintf($info, $value['name'], $value['metal'], $value['crystal'], $value['deuterium'], $value['suma']));
            }
        }

        $total = $this->convert($metal, $crystal, $deuterium);
        $info = "total: metal: %s, crystal: %s, deuterium: %s, total: %s";
        $this->info(sprintf($info, $metal, $crystal, $deuterium, floor($total)));

        return $total;
    }

    private function convert(int $metal, int $crystal, int $deuterium)
    {
        return $metal / 3 + $crystal / 2 + $deuterium;
    }

    private function metalTotal(array $data)
    {
        $base = 30 * self::SPEED;
        $metalBonus = $this->getMetalBonus($data['size']);
        $base *= $metalBonus;
        $metalProduct = $base * $data['metal'] * pow(1.1, $data['metal']);
		$metalProduct = floor($metalProduct);
        $plasma = $data['plasma'] * 1 * $metalProduct / 100;
        $class = $data['class'] ? $metalProduct * 0.25 : 0;
        $ally = $data['ally'] ? $metalProduct * 0.05 : 0;
		$magma = $data['magma'] * $metalProduct * 0.02;
		$lifeformData = $data['lifeform'];
		$crawler = ($data['metal'] + $data['crystal'] + $data['deuterium']) * 8 * 0.0002 * $metalProduct * $data['crawler_percent']/100;
		$lifeform = (1 + $lifeformData['bonus']) * ($lifeformData['powered'] * 0.0008 + $lifeformData['depth'] * 0.0008) * $metalProduct;

		return floor($base) + floor($metalProduct) + round($plasma,3) + round($class,3) + round($ally,3) + round($magma,3) + round($lifeform,3) + round($crawler,3);
    }

    private function crystalTotal(array $data)
    {
        $base = 15 * self::SPEED;
        $crystalBonus = $this->getCrystalBonus($data['size']);
        $base *= $crystalBonus;
        $base2 = 20 * self::SPEED;
        $crystalBonus = $this->getCrystalBonus($data['size']);
        $base2 *= $crystalBonus;
        $crystalProduct = $base2 * $data['crystal'] * pow(1.1, $data['crystal']);
		$crystalProduct = floor($crystalProduct);
        $plasma = $data['plasma'] * 0.66 * $crystalProduct / 100;
        $class = $data['class'] ? $crystalProduct * 0.25 : 0;
        $ally = $data['ally'] ? $crystalProduct * 0.05 : 0;
        $refinery = $data['refinery'] ? $data['refinery'] * $crystalProduct * 0.02 : 0;
		$lifeformData = $data['lifeform'];
		$crawler = ($data['metal'] + $data['crystal'] + $data['deuterium']) * 8 * 0.0002 * $crystalProduct * $data['crawler_percent']/100;
		$lifeform = (1 + $lifeformData['bonus']) * ($lifeformData['powered'] * 0.0008 + $lifeformData['acoustic'] * 0.0008) * $crystalProduct;

        return floor($base) + floor($crystalProduct) + round($plasma,3) + round($class,3) + round($ally,3) + round($refinery,3) + round($lifeform,3) + round($crawler,3);
    }
	
    private function deuteriumTotal(array $data)
    {
        $base = 10 * self::SPEED;
        $deuteriumProduct = $base * $data['deuterium'] * pow(1.1, $data['deuterium']) * (1.36 - 0.004 * $data['temp']);
		$deuteriumProduct = floor($deuteriumProduct);
        $reactor = $data['reactor'] ? self::SPEED * 10 * $data['reactor'] * pow(1.1, $data['reactor']) : 0;
        $plasma = $data['plasma'] * 0.33 * $deuteriumProduct / 100;
        $class = $data['class'] ? $deuteriumProduct * 0.25 : 0;
        $ally = $data['ally'] ? $deuteriumProduct * 0.05 : 0;
        $syn = $data['syn'] ? $data['syn'] * $deuteriumProduct * 0.02 : 0;
		$lifeformData = $data['lifeform'];
		$crawler = ($data['metal'] + $data['crystal'] + $data['deuterium']) * 8 * 0.0002 * $deuteriumProduct * $data['crawler_percent']/100;

		$lifeform = (1 + $lifeformData['bonus']) * ($lifeformData['powered'] * 0.0008 + $lifeformData['pump'] * 0.0008) * $deuteriumProduct;

        return floor($deuteriumProduct) + floor($plasma) + floor($class) + floor($ally) - floor($reactor) + floor($syn) + floor($lifeform) + floor($crawler);
    }

    private function getMetalBonus(int $size)
    {
        switch ($size) {
            case 6:
            case 10:
                return 1.17;
            case 7:
            case 9:
                return 1.23;
            case 8:
                return 1.35;
        }

        return 1;
    }

    private function getCrystalBonus(int $size)
    {
        switch ($size) {
            case 1:
                return 1.4;
            case 2:
                return 1.3;
            case 3:
                return 1.2;
        }

        return 1;
    }
}
