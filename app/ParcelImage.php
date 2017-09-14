<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParcelImage extends Model
{
    protected $fillable = [
        'filename', 'alt', 'parcel_id'
    ];
}
