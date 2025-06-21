@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm p-4">
        <h1 class="mb-4">{{ $service->name }}</h1>

        <p><strong>Turi:</strong> {{ $service->type }}</p>

        <div class="mt-4">
            <a href="{{ route('services.index') }}" class="btn btn-secondary">Orqaga</a>
            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning ms-2">Tahrirlash</a>

            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ms-2">O‘chirish</button>
            </form>
        </div>
    </div>
</div>
@endsection
