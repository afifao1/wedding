<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Venue;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $serviceCount = Service::count();
        $venueCount = Venue::count();
        $bookCount = Book::count();

        return view('home', compact('serviceCount', 'venueCount', 'bookCount'));
    }
}
