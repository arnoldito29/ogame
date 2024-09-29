<?php

namespace App\Services;

use App\Modules\Resources;
use App\Modules\Server;

class ResourceService
{
    public function __construct(Resources $resources)
    {
        $this->resources = $resources;
    }
}
