@extends('layouts.app')

@section('content')
    <h1>Hotels</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <button class="btn btn-primary" onclick="window.location.href='{{ route('hotels.create') }}'">Create New Hotel</button>
    {{-- <a href="{{ route('hotels.create') }}">Create New Hotel</a> --}}

    <ul>
        @foreach ($hotels as $hotel)
            <li>
                <a href="{{ route('hotels.show', $hotel) }}">{{ $hotel->name }}</a>
                <a href="{{ route('hotels.edit', $hotel) }}">Edit</a>
                <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
