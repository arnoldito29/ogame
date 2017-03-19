<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Apiv1Controller extends ApiController
{
    private $allow_methods = [];
    
    public function index( $method )
    {
        return $this->returnData( ['test' => 'aaa'], 200 );
    }
}
