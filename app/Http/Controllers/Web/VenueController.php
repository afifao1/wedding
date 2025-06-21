<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Models\Service;
use App\Services\VenueService;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    protected $venueService;

    public function __construct(VenueService $venueService)
    {
        $this->venueService = $venueService;
    }

    public function index()
    {
        $venues = $this->venueService->getAllVenues();
        return view('venues.index', compact('venues'));
    }

    public function create()
    {
        $services = Service::all();
        return view('venues.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $this->venueService->createVenue($validated);

        return redirect()->route('venues.index')->with('success', 'Venue muvaffaqiyatli qo‘shildi!');
    }

    public function show(Venue $venue)
    {
        $venue = $this->venueService->getVenueById($venue->id);
        return view('venues.show', compact('venue'));
    }

    public function edit(Venue $venue)
    {
        $services = Service::all();
        return view('venues.edit', compact('venue', 'services'));
    }

    public function update(Request $request, Venue $venue)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $this->venueService->updateVenue($venue, $validated);

        return redirect()->route('venues.index')->with('success', 'Venue muvaffaqiyatli yangilandi!');
    }

    public function destroy(Venue $venue)
    {
        $this->venueService->deleteVenue($venue);

        return redirect()->route('venues.index')->with('success', 'Venue muvaffaqiyatli o‘chirildi!');
    }
}
