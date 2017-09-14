<?php
/**
 * Created by PhpStorm.
 * User: K_Hakimboev
 * Date: 12.06.2017
 * Time: 16:20
 */

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait Userstamps
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {

            if (Auth::user()) {
                $model->created_by = Auth::user()->id;
            }
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id;
        });
    }
}