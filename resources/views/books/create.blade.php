@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">📚 Yangi Kitob Qo‘shish</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Sarlavha:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Muallif:</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tavsif:</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Qo‘shish</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary ms-2">Orqaga</a>
    </form>
</div>
@endsection
