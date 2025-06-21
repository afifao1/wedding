<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\VenueService;
use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
    protected $venueService;

    public function __construct(VenueService $venueService)
    {
        $this->venueService = $venueService;
    }

    // Barcha venues
    public function index()
    {
        return response()->json($this->venueService->getAllVenues());
    }

    // Bitta venue
    public function show(Venue $venue)
    {
        return response()->json($this->venueService->getVenueById($venue->id));
    }

    // Yangi venue qo'shish
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $venue = $this->venueService->createVenue($validated);

        return response()->json($venue, 201);
    }

    // Venue yangilash
    public function update(Request $request, Venue $venue)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $updatedVenue = $this->venueService->updateVenue($venue, $validated);

        return response()->json($updatedVenue);
    }

    // Venue o'chirish
    public function destroy(Venue $venue)
    {
        $this->venueService->deleteVenue($venue);

        return response()->json(['message' => 'Venue muvaffaqiyatli o‘chirildi']);
    }
}
