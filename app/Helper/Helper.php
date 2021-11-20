<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Collection;

class Helper
{
    public static function arrayForSelectInput(Collection $model)
    {
        return $model->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        });
    }
}
