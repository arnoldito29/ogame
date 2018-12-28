<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public $prefix = 'admin.';

    public function index()
    {
        return view($this->prefix . 'index');
    }
}
