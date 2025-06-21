<?php
namespace App\Http\Controllers\Api\V1;

use App\Services\ServiceService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        return response()->json($this->serviceService->getAllServices());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'type' => 'required']);
        $service = $this->serviceService->createService($request->all());
        return response()->json($service);
    }

    public function update(Request $request, Service $service)
    {
        $request->validate(['name' => 'required', 'type' => 'required']);
        $this->serviceService->updateService($service, $request->all());
        return response()->json(['message' => 'Xizmat yangilandi']);
    }

    public function destroy(Service $service)
    {
        $this->serviceService->deleteService($service);
        return response()->json(['message' => 'Xizmat o‘chirildi']);
    }

    public function show($id)
    {
        $service = $this->serviceService->getServiceById($id);
        return response()->json($service);
    }
}
