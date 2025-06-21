@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $venue->name }}</h1>

        <p><strong>Manzil:</strong> {{ $venue->location }}</p>
        <p><strong>Sig‘imi:</strong> {{ $venue->capacity }}</p>
        <p><strong>Narxi:</strong> {{ $venue->price }}</p>
        <p><strong>Xizmat turi:</strong> {{ $venue->service->name }}</p>

        <a href="{{ route('venues.index') }}">Ortga</a>
    </div>
@endsection
