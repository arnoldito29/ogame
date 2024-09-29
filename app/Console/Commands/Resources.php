<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Resources extends Command
{
    const SPEED = 10;

    const MULTI = [
        'plasma',
    ];
    const COLONIES = [
        [
            'name' => 'colony 3:161:8',
            'size' => 8,
            'metal' => 41,
            'crystal' => 31,
            'deuterium' => 33,
            'reactor' => 19,
            'energy' => 19,
            'temp' => 21,
            'plasma' => 13,
            'crawler_percent' => 0.90,
            'items' => 0,
            'magma' => 16,
            'refinery'=> 4,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [
				'planets' => 11,
				'bonus' => 0.002,
				'acoustic' => 1,
				'powered' => 3,
				'depth' => 0,
				'pump' => 0,
			],
        ],
    ];

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


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $total = $this->build(self::COLONIES);
        $colonies = self::COLONIES;
        $cost = $this->updateColonies($colonies, 'metal');
        $new = $this->build($colonies);
        $this->info('metal atsiperka: ' . ($cost/($new - $total)));
        $this->info('metal atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = self::COLONIES;
        $cost = $this->updateColonies($colonies, 'crystal');
        $new = $this->build($colonies);
        $this->info('crystal atsiperka: ' . ($cost/($new - $total)));
        $this->info('crystal atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = self::COLONIES;
        $cost = $this->updateColonies($colonies, 'deuterium');
        $new = $this->build($colonies);
        $this->info('deuterium atsiperka: ' . ($cost/($new - $total)));
        $this->info('deuterium atsiperka 24: ' . (($cost/($new - $total))/24));
        $colonies = self::COLONIES;
        $cost = $this->updateColonies($colonies, 'plasma');
        $new = $this->build($colonies);
        $this->info('plasma atsiperka: ' . ($cost/($new - $total)));
        $this->info('plasma atsiperka 24: ' . (($cost/($new - $total))/24));
    }

    private function updateColonies(array &$colonies, string $update)
    {
        $cost = 0;

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
        }

        if (empty($result)) {
            return 0;
        }

        return $this->convert((int) $result['metal'],(int) $result['crystal'],(int) $result['deuterium']);
    }

    /**
     * Execute the console command.
     */
    public function build(array $colonies)
    {
        $result = [];
        foreach ($colonies as $colony) {
            $result[] = [
                'name' => $colony['name'] .' ',
                'metal' => $this->metalTotal($colony),
                'crystal' => $this->crystalTotal($colony),
                'deuterium' => $this->deuteriumTotal($colony),
            ];
        }
        $metal = 0;
        $crystal = 0;
        $deuterium = 0;
        foreach ($result as $value) {
            $metal += $value['metal'];
            $crystal += $value['crystal'];
            $deuterium += $value['deuterium'];
            $info = "planet: %s, metal: %s, crystal: %s, deuterium: %s";
            $this->info(sprintf($info, $value['name'], $value['metal'], $value['crystal'], $value['deuterium']));
        }

        $total = $this->convert($metal, $crystal, $deuterium);
        $info = "total: metal: %s, crystal: %s, deuterium: %s, total: %s";
        $this->info(sprintf($info, $metal, $crystal, $deuterium, floor($total)));

        return $total;
    }

    private function convert(int $metal, int $crystal, int $deuterium)
    {
        return $metal / 2.5 + $crystal / 1.5 + $deuterium;
    }

    private function metalTotal(array $data)
    {
        $base = 30 * self::SPEED;
        $metalBonus = $this->getMetalBonus($data['size']);
        $base *= $metalBonus;
        $metalProduct = $base * $data['metal'] * pow(1.1, $data['metal']);
        $plasma = $data['plasma'] * 1 * $metalProduct / 100;
        $class = $data['class'] ? $metalProduct * 0.25 : 0;
        $ally = $data['ally'] ? $metalProduct * 0.05 : 0;
		$magma = $data['magma'] * $metalProduct * 0.02;
		$lifeformData = $data['lifeform'];
		$crawler = ($data['metal'] + $data['crystal'] + $data['deuterium']) * 8 * 0.0002 * $metalProduct * $data['crawler_percent'];
		$lifeform = (1 + $lifeformData['bonus']) * $lifeformData['planets'] * ($lifeformData['powered'] * 0.0008 + $lifeformData['depth'] * 0.0008) * $metalProduct;

        return floor($base) + floor($metalProduct) + floor($plasma) + floor($class) + floor($ally) + floor($magma) + floor($lifeform) + floor($crawler);
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
        $plasma = $data['plasma'] * 0.66 * $crystalProduct / 100;
        $class = $data['class'] ? $crystalProduct * 0.25 : 0;
        $ally = $data['ally'] ? $crystalProduct * 0.05 : 0;
        $refinery = $data['refinery'] ? $data['refinery'] * $crystalProduct * 0.02 : 0;
		$lifeformData = $data['lifeform'];
		$crawler = ($data['metal'] + $data['crystal'] + $data['deuterium']) * 8 * 0.0002 * $crystalProduct * $data['crawler_percent'];
		$lifeform = (1 + $lifeformData['bonus']) * $lifeformData['planets'] * ($lifeformData['powered'] * 0.0008 + $lifeformData['acoustic'] * 0.0008) * $crystalProduct;

        return floor($base) + floor($crystalProduct) + floor($plasma) + floor($class) + floor($ally) + floor($refinery) + floor($lifeform) + floor($crawler);
    }
    private function deuteriumTotal(array $data)
    {
        $base = 10 * self::SPEED;
        $deuteriumProduct = $base * $data['deuterium'] * pow(1.1, $data['deuterium']) * (1.36 - 0.004 * $data['temp']);
        $reactor = $data['reactor'] ? self::SPEED * 10 * $data['reactor'] * pow(1.1, $data['reactor']) : 0;
        $plasma = $data['plasma'] * 0.33 * $deuteriumProduct / 100;
        $class = $data['class'] ? $deuteriumProduct * 0.25 : 0;
        $ally = $data['ally'] ? $deuteriumProduct * 0.05 : 0;
        $syn = $data['syn'] ? $data['syn'] * $deuteriumProduct * 0.02 : 0;
		$lifeformData = $data['lifeform'];
		$crawler = ($data['metal'] + $data['crystal'] + $data['deuterium']) * 8 * 0.0002 * $deuteriumProduct * $data['crawler_percent'];
		$lifeform = (1 + $lifeformData['bonus']) * $lifeformData['planets'] * ($lifeformData['powered'] * 0.0008 + $lifeformData['pump'] * 0.0008) * $deuteriumProduct;

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
