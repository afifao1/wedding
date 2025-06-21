@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">🏢 To‘yxonalar</h1>
    <a href="{{ route('venues.create') }}" class="btn btn-success mb-4">➕ Yangi To‘yxona Qo‘shish</a>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-4 ms-2">🏠 Home</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
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
                            <a href="{{ route('venues.show', $venue->id) }}" class="btn btn-info btn-sm me-2">Ko‘rish</a>
                            <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-warning btn-sm me-2">Tahrirlash</a>

                            <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">O‘chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
