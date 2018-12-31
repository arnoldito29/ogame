<?php

namespace App\Modules;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{
    protected $table = 'birthdays';

    public function getYears()
    {
        $date = Carbon::parse($this->birthday);
        $diffDate = Carbon::now()->diffInYears($date);

        return $diffDate;
    }
}
