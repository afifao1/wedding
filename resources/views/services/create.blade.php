@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yangi Xizmat Qo‘shish</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div>
                <label>Nomi:</label>
                <input type="text" name="name" required>
            </div>

            <div>
                <label>Turi:</label>
                <input type="text" name="type" required>
            </div>

            <button type="submit">Qo‘shish</button>
        </form>
    </div>
@endsection
