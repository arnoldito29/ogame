<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    const STRUCTURE = [
        [
            'name' => 'Birthday',
            'template' => 'birthdays',
            'class' => Birthday::class,
            'url' => 'birthdays',
        ]
    ];

    protected $table = 'process';

    public function model()
    {
        return $this->morphTo('model');
    }

    public function getTemplate()
    {
        $modules = array_column(self::STRUCTURE, 'template', 'class');

        return !empty($modules[$this->model_type]) ? $modules[$this->model_type] : 'default';
    }

    public function getName()
    {
        $modules = array_column(self::STRUCTURE, 'name', 'class');

        return !empty($modules[$this->model_type]) ? $modules[$this->model_type] : 'default';
    }
}
