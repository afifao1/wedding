@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <ul style="list-style: none; padding: 0; font-size: 20px;">
            <li style="margin-bottom: 15px;">
                <a href="{{ route('services.index') }}">🏛 Xizmatlar ({{ $serviceCount }} ta)</a>
            </li>
            <li style="margin-bottom: 15px;">
                <a href="{{ route('venues.index') }}">🏢 To‘yxonalar ({{ $venueCount }} ta)</a>
            </li>
            <li style="margin-bottom: 15px;">
                <a href="{{ route('books.index') }}">📚 Kitoblar ({{ $bookCount }} ta)</a>
            </li>
        </ul>
    </div>
@endsection
