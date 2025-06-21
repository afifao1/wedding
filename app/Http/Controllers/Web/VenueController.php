<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Cache::remember('venues_web', 86400, function () {
            return Venue::with('service')->get();
        });

        return view('venues.index', compact('venues'));
    }

    public function create()
    {
        $services = Service::all();
        return view('venues.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Venue::create($request->all());
        Cache::forget('venues_web');

        return redirect()->route('venues.index')->with('success', 'Venue qo‘shildi!');
    }

    public function edit(Venue $venue)
    {
        $services = Service::all();
        return view('venues.edit', compact('venue', 'services'));
    }

    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            'service_id' => 'required',
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $venue->update($request->all());
        Cache::forget('venues_web');

        return redirect()->route('venues.index')->with('success', 'Venue yangilandi!');
    }

    public function destroy(Venue $venue)
    {
        $venue->delete();
        Cache::forget('venues_web');

        return redirect()->route('venues.index')->with('success', 'Venue o‘chirildi!');
    }
}
