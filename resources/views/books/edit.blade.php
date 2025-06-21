@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kitobni Tahrirlash</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label>Sarlavha:</label>
                <input type="text" name="title" value="{{ $book->title }}" required>
            </div>

            <div>
                <label>Muallif:</label>
                <input type="text" name="author" value="{{ $book->author }}" required>
            </div>

            <div>
                <label>Tavsif:</label>
                <textarea name="description" required>{{ $book->description }}</textarea>
            </div>

            <button type="submit">Saqlash</button>
        </form>
    </div>
@endsection
