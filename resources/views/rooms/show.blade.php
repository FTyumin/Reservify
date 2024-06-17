@extends('layouts.app')

@section('content')
    <h1>Room Details</h1>
    <p>Hotel ID: {{ $room->hotel_id }}</p>
    <p>Room Number: {{ $room->room_number }}</p>
    <p>Type: {{ $room->type }}</p>
    <p>Price: {{ $room->price }}</p>
    <p>Availability: {{ $room->availability }}</p>
    <a href="{{ route('rooms.edit', $room->id) }}">Edit</a>
    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection