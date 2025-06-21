<?php
namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceService
{
    public function getAllServices()
    {
        return Cache::remember('services_web', 86400, function () {
            return Service::all();
        });
    }

    public function createService(array $data)
    {
        Cache::forget('services_web');
        return Service::create($data);
    }

    public function updateService(Service $service, array $data)
    {
        Cache::forget('services_web');
        return $service->update($data);
    }

    public function deleteService(Service $service)
    {
        Cache::forget('services_web');
        return $service->delete();
    }

    public function getServiceById($id)
    {
        return Service::findOrFail($id);
    }

}
