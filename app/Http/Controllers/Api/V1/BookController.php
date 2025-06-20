<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    public function index()
    {
        $books = Cache::remember('books', 3600, function () {
            return Book::all();
        });

        return response()->json($books);
    }

    public function show($id)
    {
        $book = Cache::remember('book_' . $id, 3600, function () use ($id) {
            return Book::findOrFail($id);
        });

        return response()->json($book);
    }
}
