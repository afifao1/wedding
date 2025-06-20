<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Support\Facades\Cache;

class VenueWebController extends Controller
{
    public function index()
    {
        $venues = Cache::remember('venues_web', 3600, function () {
            return Venue::with('service')->get();
        });

        return view('web.venues.index', compact('venues'));
    }
}
