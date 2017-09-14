<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingRequestType extends Model
{
    /**
     * Атрибуты для массового заполнения
     *
     * @var array
     */
    protected $fillable = [
        'name', 'template', 'available',
    ];
}
