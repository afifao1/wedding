@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h1 class="mb-4">{{ $book->title }}</h1>

        <p><strong>Muallif:</strong> {{ $book->author }}</p>
        <p><strong>Tavsif:</strong> {{ $book->description }}</p>

        <div class="mt-4">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Orqaga</a>
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning ms-2">Tahrirlash</a>

            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ms-2">O‘chirish</button>
            </form>
        </div>
    </div>
</div>
@endsection
