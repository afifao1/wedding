<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Support\Facades\Cache;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Cache::remember('venues', 86400, function () {
            return Venue::with('service')->get();
        });

        return response()->json($venues);
    }

    public function show($id)
    {
        $venue = Cache::remember("venue_$id", 86400, function () use ($id) {
            return Venue::with('service')->findOrFail($id);
        });

        return response()->json($venue);
    }
}
