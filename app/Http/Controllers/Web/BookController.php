<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $this->bookService->createBook($request->all());
        return redirect()->route('books.index')->with('success', 'Kitob muvaffaqiyatli qo‘shildi');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $this->bookService->updateBook($book, $request->all());
        return redirect()->route('books.index')->with('success', 'Kitob muvaffaqiyatli yangilandi');
    }

    public function destroy(Book $book)
    {
        $this->bookService->deleteBook($book);
        return redirect()->route('books.index')->with('success', 'Kitob muvaffaqiyatli o‘chirildi');
    }
}
