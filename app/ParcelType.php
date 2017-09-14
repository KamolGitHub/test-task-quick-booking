<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParcelType extends Model
{
    /**
     * Атрибуты для массового заполнения
     *
     * @var array
     */
    protected $fillable = [
        'name', 'available',
    ];


}
