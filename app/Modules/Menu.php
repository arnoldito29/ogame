<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public function child() {
        return $this->hasMany(Menu::class,'parent_id','id') ;
    }
}
