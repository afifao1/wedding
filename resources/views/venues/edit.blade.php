@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>To‘yxona Tahrirlash</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('venues.update', $venue->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label>Xizmat turi:</label>
                <select name="service_id" required>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ $venue->service_id == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Nomi:</label>
                <input type="text" name="name" value="{{ $venue->name }}" required>
            </div>

            <div>
                <label>Manzil:</label>
                <input type="text" name="location" value="{{ $venue->location }}" required>
            </div>

            <div>
                <label>Sig‘imi:</label>
                <input type="number" name="capacity" value="{{ $venue->capacity }}" required>
            </div>

            <div>
                <label>Narxi:</label>
                <input type="number" name="price" value="{{ $venue->price }}" required>
            </div>

            <button type="submit">Saqlash</button>
        </form>
    </div>
@endsection
