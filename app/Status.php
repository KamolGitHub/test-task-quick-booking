<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const TO_STORAGE = 1;
    const PROHIBITED = 2;
    const SENT = 3;

    public $table = "status";

    /**
     * Атрибуты для массового заполнения
     *
     * @var array
     */
    protected $fillable = [
        'name', 'available',
    ];
}
