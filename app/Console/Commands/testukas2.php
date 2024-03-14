<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testukas2 extends Command
{
    const SPEED = 8;
    const COLONIES = [
        [
            'name' => 'colony 3:47:4',
            'size' => 4,
            'metal' => 34,
            'crystal' => 29,
            'deuterium' => 29,
            'reactor' => 16,
            'energy' => 16,
            'temp' => 53,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 3:47:9',
            'size' => 9,
            'metal' => 36,
            'crystal' => 31,
            'deuterium' => 31,
            'reactor' => 18,
            'energy' => 16,
            'temp' => 4,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 2:133:8',
            'size' => 8,
            'metal' => 34,
            'crystal' => 28,
            'deuterium' => 30,
            'reactor' => 17,
            'energy' => 16,
            'temp' => 30,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 2:133:9',
            'size' => 9,
            'metal' => 34,
            'crystal' => 28,
            'deuterium' => 29,
            'reactor' => 17,
            'energy' => 16,
            'temp' => 35,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 3:350:8',
            'size' => 8,
            'metal' => 35,
            'crystal' => 30,
            'deuterium' => 30,
            'reactor' => 17,
            'energy' => 16,
            'temp' => 38,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 3:350:10',
            'size' => 10,
            'metal' => 35,
            'crystal' => 31,
            'deuterium' => 30,
            'reactor' => 17,
            'energy' => 16,
            'temp' => 12,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 1:380:9',
            'size' => 9,
            'metal' => 35,
            'crystal' => 30,
            'deuterium' => 30,
            'reactor' => 17,
            'energy' => 16,
            'temp' => 35,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 1:380:10',
            'size' => 10,
            'metal' => 35,
            'crystal' => 31,
            'deuterium' => 31,
            'reactor' => 18,
            'energy' => 16,
            'temp' => 8,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 1:392:9',
            'size' => 9,
            'metal' => 31,
            'crystal' => 27,
            'deuterium' => 13,
            'reactor' => 0,
            'energy' => 16,
            'temp' => 29,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 1:392:7',
            'size' => 7,
            'metal' => 31,
            'crystal' => 27,
            'deuterium' => 21,
            'reactor' => 10,
            'energy' => 16,
            'temp' => 42,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 1:329:8',
            'size' => 8,
            'metal' => 29,
            'crystal' => 25,
            'deuterium' => 21,
            'reactor' => 6,
            'energy' => 16,
            'temp' => 43,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
        [
            'name' => 'colony 1:329:9',
            'size' => 9,
            'metal' => 13,
            'crystal' => 20,
            'deuterium' => 11,
            'reactor' => 1,
            'energy' => 16,
            'temp' => 37,
            'plasma' => 11,
            'creeper' => 0,
            'items' => 0,
            'magma' => 0,
            'refinery'=> 0,
            'syn' => 0,
            'class' => false,
            'ally' => true,
            'lifeform' => [],
        ],
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testukas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $total = $this->build(self::COLONIES);
        $colonies = self::COLONIES;
        $cost = $this->updateColonies($colonies, 'metal');
        $new = $this->build($colonies);
        $this->info('atsiperka: ' . ($cost/($new - $total)));
        $this->info('atsiperka 24: ' . (($cost/($new - $total))/24));
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

        return floor($base) + floor($metalProduct) + floor($plasma) + floor($class) + floor($ally);
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

        return floor($base) + floor($crystalProduct) + floor($plasma) + floor($class) + floor($ally);
    }
    private function deuteriumTotal(array $data)
    {
        $base = 10 * self::SPEED;
        $deuteriumProduct = $base * $data['deuterium'] * pow(1.1, $data['deuterium']) * (1.36 - 0.004 * $data['temp']);
        $reactor = $data['reactor'] ? self::SPEED * 10 * $data['reactor'] * pow(1.1, $data['reactor']) : 0;
        $plasma = $data['plasma'] * 0.33 * $deuteriumProduct / 100;
        $class = $data['class'] ? $deuteriumProduct * 0.25 : 0;
        $ally = $data['ally'] ? $deuteriumProduct * 0.05 : 0;

        return floor($deuteriumProduct) + floor($plasma) + floor($class) + floor($ally) - floor($reactor);
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
