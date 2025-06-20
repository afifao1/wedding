<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Cache;

class BookWebController extends Controller
{
    public function index()
    {
        $books = Cache::remember('books_web', 3600, function () {
            return Book::all();
        });

        return view('web.books.index', compact('books'));
    }
}
