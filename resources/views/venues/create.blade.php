@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yangi To‘yxona Qo‘shish</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('venues.store') }}" method="POST">
            @csrf
            <div>
                <label>Xizmat turi:</label>
                <select name="service_id" required>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Nomi:</label>
                <input type="text" name="name" required>
            </div>

            <div>
                <label>Manzil:</label>
                <input type="text" name="location" required>
            </div>

            <div>
                <label>Sig‘imi:</label>
                <input type="number" name="capacity" required>
            </div>

            <div>
                <label>Narxi:</label>
                <input type="number" name="price" required>
            </div>

            <button type="submit">Qo‘shish</button>
        </form>
    </div>
@endsection
