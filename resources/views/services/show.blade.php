@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $service->name }}</h1>
    <p><strong>Type:</strong> {{ $service->type }}</p>
    <a href="{{ route('services.index') }}" class="btn btn-secondary mt-3">Orqaga</a>
</div>
@endsection
