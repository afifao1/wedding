<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    public function index()
    {
        $books = Cache::remember('books_web', 86400, function () {
            return Book::all();
        });

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);

        Book::create($request->all());
        Cache::forget('books_web');

        return redirect()->route('books.index')->with('success', 'Kitob qo‘shildi!');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);

        $book->update($request->all());
        Cache::forget('books_web');

        return redirect()->route('books.index')->with('success', 'Kitob yangilandi!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        Cache::forget('books_web');

        return redirect()->route('books.index')->with('success', 'Kitob o‘chirildi!');
    }
}
