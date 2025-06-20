<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use App\Models\Venue;

class RefreshVenueCache extends Command
{
    protected $signature = 'refresh:venue-cache';
    protected $description = 'Venues cache ni yangilaydi';

    public function handle()
    {
        Cache::forget('venues'); // Eski cache ni o'chiradi

        Cache::put('venues', Venue::with('service')->get(), 86400); // Yangi cache yaratadi 1 kunga

        $this->info('Venues cache muvaffaqiyatli yangilandi!');
    }
}
