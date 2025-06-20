<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'location',
        'capacity',
        'price'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
