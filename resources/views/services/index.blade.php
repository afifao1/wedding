@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">🏛 Xizmatlar</h1>
    <a href="{{ route('services.create') }}" class="btn btn-success mb-4">➕ Yangi Xizmat Qo‘shish</a>
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
                    <th>Turi</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->type }}</td>
                        <td>
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-info btn-sm me-2">Ko‘rish</a>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm me-2">Tahrirlash</a>

                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
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
