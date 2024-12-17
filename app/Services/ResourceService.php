<?php

namespace App\Services;

use App\Modules\Resources;
use App\Modules\Server;
use Illuminate\Support\Collection;

class ResourceService
{
    public function __construct(Resources $resources)
    {
        $this->resources = $resources;
    }

    public function getColonies($powerAdd = 0, $metalAdd = 0, $crystalAdd = 0, $deuteriumAdd = 0): array
    {
        $data = $this->getResourcesData();
        $power = 0;
        $metal = 0;
        $crystal = 0;
        $deuterium = 0;

        foreach ($data as $resource) {
            $power += $resource->powered;
            $metal += $resource->depth;
            $crystal += $resource->acoustic;
            $deuterium += $resource->pump;
            $returnData[] = [
                'name' => $resource->name,
                'size' => $resource->size,
                'metal' => $resource->metal,
                'crystal' => $resource->crystal,
                'deuterium' => $resource->deuterium,
                'reactor' =>  $resource->reactor,
                'energy' => $resource->energy,
                'temp' => $resource->temp,
                'plasma' => $resource->plasma,
                'crawler_percent' => $resource->crawler_percent,
                'items' => $resource->items,
                'magma' => $resource->magma,
                'refinery'=> $resource->refinery,
                'syn' => $resource->syn,
                'class' => $resource->class,
                'ally' => $resource->ally,
                'lifeform' => [
                    'bonus' => $resource->bonus,
                ],
            ];
        }

        foreach ($returnData as $key => $data) {
            $returnData[$key]['lifeform'] = [
                'bonus' => $data['lifeform']['bonus'],
                'powered' => $power + $powerAdd,
                'acoustic' => $crystal + $crystalAdd,
                'depth' => $metal + $metalAdd,
                'pump' => $deuterium + $deuteriumAdd,
            ];
        }

        return $returnData;
    }

    private function getResourcesData(): Collection
    {
        return $this->resources::all();
    }
}
