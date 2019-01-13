<?php

namespace App\Modules;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    public function getDiff()
    {
        $item = self::where('ad_id', '=', $this->ad_id)
            ->where('id', '<', $this->id)
            ->orderBy('id', 'DESC')
            ->first();

        if (empty($item)) {
            return '';
        }

        return Helper::getPriceDiff($item->price, $this->price);
    }
}
