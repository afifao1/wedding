@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">➕ Yangi To‘yxona Qo‘shish</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('venues.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Xizmat turi:</label>
            <select name="service_id" class="form-select" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomi:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Manzil:</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sig‘imi:</label>
            <input type="number" name="capacity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Narxi:</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Qo‘shish</button>
        <a href="{{ route('venues.index') }}" class="btn btn-secondary ms-2">Orqaga</a>
    </form>
</div>
@endsection
