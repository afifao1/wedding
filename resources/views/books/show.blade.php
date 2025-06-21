@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>

        <p><strong>Muallif:</strong> {{ $book->author }}</p>
        <p><strong>Tavsif:</strong> {{ $book->description }}</p>

        <a href="{{ route('books.index') }}">Orqaga</a>
        <a href="{{ route('books.edit', $book->id) }}" style="margin-left: 10px;">Tahrirlash</a>

        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline; margin-left: 10px;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
            @csrf
            @method('DELETE')
            <button type="submit" style="color: red;">O‘chirish</button>
        </form>
    </div>
@endsection
