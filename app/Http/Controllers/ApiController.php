<?php

namespace App\Http\Controllers;

use Request;

class ApiController extends Controller
{
    public function returnData( $data = [], $status = 200 )
    {
       return response()->json( $data, $status );
    }
}
