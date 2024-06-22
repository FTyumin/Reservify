@extends('layouts.app')

@section('content')
    <h1>{{ $hotel->name }}</h1>
    <p>Location: {{ $hotel->location }}</p>
    <p>Email: {{ $hotel->email }}</p>
    <p>Phone: {{ $hotel->phone }}</p>
    <p>Rating: {{ $hotel->rating }}</p>
    <a href="{{ route('hotels.index') }}">Back to list</a>
    <a href="{{ route('hotels.edit', $hotel->id) }}">Edit</a>


    <h2>Rooms</h2>
    <ul>
        @foreach ($hotel->rooms as $room)
            <li>
                 <a href="{{ route('rooms.show', ['hotel' => $hotel->id, 'room' => $room->id]) }}">{{ $room->type }}</a> 
                 - {{ $room->price }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('rooms.create', ['hotel' => $hotel->id]) }}">Create Room</a>
@endsection