@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h1 class="mb-4">{{ $venue->name }}</h1>

        <p><strong>📍 Manzil:</strong> {{ $venue->location }}</p>
        <p><strong>👥 Sig‘imi:</strong> {{ $venue->capacity }}</p>
        <p><strong>💵 Narxi:</strong> {{ $venue->price }}</p>
        <p><strong>🏛 Xizmat turi:</strong> {{ $venue->service->name }}</p>

        <div class="mt-4">
            <a href="{{ route('venues.index') }}" class="btn btn-secondary">Orqaga</a>
            <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-warning ms-2">Tahrirlash</a>

            <form action="{{ route('venues.destroy', $venue->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ms-2">O‘chirish</button>
            </form>
        </div>
    </div>
</div>
@endsection
