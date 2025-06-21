@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kitoblar</h1>
        <a href="{{ route('books.create') }}">Yangi Kitob Qo‘shish</a>

        @if (session('success'))
            <div style="color: green; margin-top: 10px;">
                {{ session('success') }}
            </div>
        @endif

        <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Sarlavha</th>
                    <th>Muallif</th>
                    <th>Tavsif</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->description }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" style="margin-right: 10px;">Tahrirlash</a>

                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red;">O‘chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
