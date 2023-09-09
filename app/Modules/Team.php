<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
      'name',
      'type',
    ];
}
