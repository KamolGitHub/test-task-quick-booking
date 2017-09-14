<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * Атрибуты для массового заполнения
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'available',
    ];


}
