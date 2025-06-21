<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Services\ServiceService;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        $services = $this->serviceService->getAllServices();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'type' => 'required']);
        $this->serviceService->createService($request->all());
        return redirect()->route('services.index')->with('success', 'Xizmat qo‘shildi!');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate(['name' => 'required', 'type' => 'required']);
        $this->serviceService->updateService($service, $request->all());
        return redirect()->route('services.index')->with('success', 'Xizmat yangilandi!');
    }

    public function destroy(Service $service)
    {
        $this->serviceService->deleteService($service);
        return redirect()->route('services.index')->with('success', 'Xizmat o‘chirildi!');
    }
    
    public function show($id)
    {
        $service = $this->serviceService->getServiceById($id);
        return view('services.show', compact('service'));
    }
}

