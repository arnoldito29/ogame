<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;

class MatchGame extends Model
{
    protected $table = 'match';

    protected $fillable = [
        'team_id1',
        'team_id2',
        'team_result_1',
        'team_result_2',
        'overtime',
        'detail',
        'coff1',
        'coff2',
        'coff3',
    ];
}
