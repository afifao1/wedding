@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>To‘yxonalar</h1>
        <a href="{{ route('venues.create') }}">Yangi To‘yxona Qo‘shish</a>

        @if (session('success'))
            <div style="color: green; margin-top: 10px;">
                {{ session('success') }}
            </div>
        @endif

        <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Nomi</th>
                    <th>Manzil</th>
                    <th>Sig‘imi</th>
                    <th>Narxi</th>
                    <th>Xizmat Turi</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venues as $venue)
                    <tr>
                        <td>{{ $venue->name }}</td>
                        <td>{{ $venue->location }}</td>
                        <td>{{ $venue->capacity }}</td>
                        <td>{{ $venue->price }}</td>
                        <td>{{ $venue->service->name }}</td>
                        <td>
                            <a href="{{ route('venues.show', $venue->id) }}" style="margin-right: 10px;">Ko‘rish</a>

                            <a href="{{ route('venues.edit', $venue->id) }}" style="margin-right: 10px;">Tahrirlash</a>

                            <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
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
