<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Cache::remember('services_web', 86400, function () {
            return Service::all();
        });

        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        Service::create($request->all());
        Cache::forget('services_web');

        return redirect()->route('services.index')->with('success', 'Xizmat qo‘shildi!');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $service->update($request->all());
        Cache::forget('services_web');

        return redirect()->route('services.index')->with('success', 'Xizmat yangilandi!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        Cache::forget('services_web');

        return redirect()->route('services.index')->with('success', 'Xizmat o‘chirildi!');
    }
}
