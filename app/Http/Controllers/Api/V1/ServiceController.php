<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Cache::remember('services', 3600, function () {
            return Service::all();
        });

        return response()->json($services);
    }

    public function show($id)
    {
        $service = Cache::remember('service_' . $id, 3600, function () use ($id) {
            return Service::findOrFail($id);
        });

        return response()->json($service);
    }
}
