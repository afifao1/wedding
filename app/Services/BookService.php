<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Cache;

class BookService
{
    public function getAllBooks()
    {
        return Cache::remember('books_web', 86400, function () {
            return Book::all(); 
        });
    }

    public function createBook(array $data)
    {
        Cache::forget('books_web');
        return Book::create($data);
    }

    public function updateBook(Book $book, array $data)
    {
        Cache::forget('books_web');
        return $book->update($data);
    }

    public function deleteBook(Book $book)
    {
        Cache::forget('books_web');
        return $book->delete();
    }

    public function getBookById($id)
    {
        return Book::findOrFail($id);
    }
}
