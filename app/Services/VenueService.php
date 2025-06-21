<?php

namespace App\Services;

use App\Models\Venue;
use Illuminate\Support\Facades\Cache;

class VenueService
{
    public function getAllVenues()
    {
        return Cache::remember('venues_web', 86400, function () {
            return Venue::with('service')->get();
        });
    }

    public function createVenue(array $data)
    {
        Cache::forget('venues_web');
        return Venue::create($data);
    }

    public function updateVenue(Venue $venue, array $data)
    {
        Cache::forget('venues_web');
        return $venue->update($data);
    }

    public function deleteVenue(Venue $venue)
    {
        Cache::forget('venues_web');
        return $venue->delete();
    }

    public function getVenueById($id)
    {
        return Venue::with('service')->findOrFail($id);
    }
}
