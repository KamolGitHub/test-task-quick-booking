<?php

namespace App;

use App\Traits\Userstamps;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use Userstamps;

    /**
     * Атрибуты для массового заполнения
     *
     * @var array
     */
    protected $fillable = [
        'number', 'tracking_number', 'bar_code', 'weight', 'client_id', 'partner_id', 'status_id', 'comment'
    ];

    //scopes
    public function scopeStatusToStorage($query)
    {
        return $query->where('status_id', "=", 1);
    }

    public function scopeWithAllRelations($query)
    {
        return $query->with('client', 'createdBy', 'status', 'parcel_images');
    }

    //relations
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function shipping_requests()
    {
        return $this->belongsToMany(ShippingRequest::class, "shipping_request_parcel");
    }

    public function parcel_images()
    {
        return $this->hasMany(ParcelImage::class);
    }
}
