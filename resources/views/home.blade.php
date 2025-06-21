@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Dashboard</h1>

    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h2 class="card-title">🏛 Xizmatlar</h2>
                    <p class="card-text display-6">{{ $serviceCount }} ta</p>
                    <a href="{{ route('services.index') }}" class="btn btn-primary">Ko‘rish</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h2 class="card-title">🏢 To‘yxonalar</h2>
                    <p class="card-text display-6">{{ $venueCount }} ta</p>
                    <a href="{{ route('venues.index') }}" class="btn btn-success">Ko‘rish</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h2 class="card-title">📚 Kitoblar</h2>
                    <p class="card-text display-6">{{ $bookCount }} ta</p>
                    <a href="{{ route('books.index') }}" class="btn btn-warning">Ko‘rish</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
