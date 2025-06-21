<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return response()->json($this->bookService->getAllBooks());
    }

    public function show($id)
    {
        return response()->json($this->bookService->getBookById($id));
    }

    public function store(Request $request)
    {
        $book = $this->bookService->createBook($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, Book $book)
    {
        $this->bookService->updateBook($book, $request->all());
        return response()->json(['message' => 'Kitob muvaffaqiyatli yangilandi']);
    }

    public function destroy(Book $book)
    {
        $this->bookService->deleteBook($book);
        return response()->json(['message' => 'Kitob muvaffaqiyatli o‘chirildi']);
    }
}
