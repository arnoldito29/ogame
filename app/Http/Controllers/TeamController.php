<?php

namespace App\Http\Controllers;

use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct(TeamService $teamService)
    {
    }
}
