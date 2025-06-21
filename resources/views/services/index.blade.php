@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Xizmatlar</h1>
        <a href="{{ route('services.create') }}">Yangi Xizmat Qo‘shish</a>

        @if (session('success'))
            <div style="color: green; margin-top: 10px;">
                {{ session('success') }}
            </div>
        @endif

        <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px;">
            <thead>
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
                            <a href="{{ route('services.edit', $service->id) }}" style="margin-right: 10px;">Tahrirlash</a>

                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red;">O‘chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
