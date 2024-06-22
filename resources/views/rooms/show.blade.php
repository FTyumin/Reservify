@extends('layouts.app')

@section('content')
    <h1>Room Details</h1>

    <p>Type: {{ $room->type }}</p>
    <p>Price: {{ $room->price }}</p>
    <p>Capacity: {{ $room->capacity }}</p>
    <p>Description: {{ $room->description }}</p>
    <p>Hotel: <a href="{{ route('hotels.show', $hotel->id) }}">{{ $hotel->name }}</a></p>

    <a href="{{ route('rooms.edit', ['hotel' => $hotel->id, 'room' => $room->id]) }}">Edit Room</a>

    <form action="{{ route('rooms.destroy', ['hotel' => $hotel->id, 'room' => $room->id]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
