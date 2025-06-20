<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Venue extends Model
{
    use HasFactory;
    
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
