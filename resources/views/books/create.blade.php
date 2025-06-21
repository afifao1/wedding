@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yangi Kitob Qo‘shish</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div>
                <label>Sarlavha:</label>
                <input type="text" name="title" required>
            </div>

            <div>
                <label>Muallif:</label>
                <input type="text" name="author" required>
            </div>

            <div>
                <label>Tavsif:</label>
                <textarea name="description" required></textarea>
            </div>

            <button type="submit">Qo‘shish</button>
        </form>
    </div>
@endsection
