@extends('layouts.app')

@section('content')
    <h1>Edit Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="hotel_id">Hotel ID:</label>
        <input type="text" name="hotel_id" id="hotel_id" value="{{ $room->hotel_id }}">
        <label for="room_number">Room Number:</label>
        <input type="text" name="room_number" id="room_number" value="{{ $room->room_number }}">
        <label for="type">Type:</label>
        <input type="text" name="type" id="type" value="{{ $room->type }}">
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="{{ $room->price }}">
        <label for="availability">Availability:</label>
        <input type="text" name="availability" id="availability" value="{{ $room->availability }}">
        <button type="submit">Update</button>
    </form>
@endsection