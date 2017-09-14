<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingRequest extends Model
{

    //scopes
    public function scopeStatusToStorage($query)
    {
        return $query->where('status_id', "=", 1);
    }

    public function scopeWithAllRelations($query)
    {
        return $query->with('client', 'shipping_request_type');
    }

    //relations

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function shipping_request_type()
    {
        return $this->belongsTo(ShippingRequestType::class);
    }

    public function parcels()
    {
        return $this->belongsToMany(Parcel::class, "shipping_request_parcel");
    }
}
