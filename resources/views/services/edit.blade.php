@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">✏️ Xizmatni Tahrirlash</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('services.update', $service->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nomi:</label>
            <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Turi:</label>
            <input type="text" name="type" class="form-control" value="{{ $service->type }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Saqlash</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary ms-2">Orqaga</a>
    </form>
</div>
@endsection
