@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Xizmatni Tahrirlash</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label>Nomi:</label>
                <input type="text" name="name" value="{{ $service->name }}" required>
            </div>

            <div>
                <label>Turi:</label>
                <input type="text" name="type" value="{{ $service->type }}" required>
            </div>

            <button type="submit">Saqlash</button>
        </form>
    </div>
@endsection
