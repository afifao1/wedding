@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">📚 Kitoblar</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Yangi Kitob Qo‘shish</a>
        <a href="{{ route('home') }}" class="btn btn-secondary mb-4 ms-2">🏠 Home</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Sarlavha</th>
                    <th>Muallif</th>
                    <th>Tavsif</th>
                    <th style="width: 180px;">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ Str::limit($book->description, 50) }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm me-1">Ko‘rish</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm me-1">Tahrirlash</a>

                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">O‘chirish</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Kitoblar topilmadi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
