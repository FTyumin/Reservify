@extends('layouts.app')

@section('content')
    <h1>Hotels</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <ul>
        @foreach($hotels as $hotel)
            <li>
                <h2>{{ $hotel->name }}</h2>
                <p>{{ $hotel->location }}</p>
                @auth
                    <a href="{{ route('reservations.create', ['hotel_id' => $hotel->id]) }}">Select Hotel</a>
                    @if (Auth::user()->isAdmin())
                        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete Hotel</button>
                        </form>
                    @endif
                @endauth
            </li>
        @endforeach
    </ul>
@endsection
