<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceWebController extends Controller
{
    public function index()
    {
        $services = Cache::remember('services_web', 3600, function () {
            return Service::all();
        });

        return view('web.services.index', compact('services'));
    }
}
