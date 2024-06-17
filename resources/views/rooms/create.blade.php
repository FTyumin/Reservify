@extends('layouts.app')

@section('content')
    <h1>Create Room</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <label for="hotel_id">Hotel ID:</label>
        <input type="text" name="hotel_id" id="hotel_id">
        <label for="room_number">Room Number:</label>
        <input type="text" name="room_number" id="room_number">
        <label for="type">Type:</label>
        <input type="text" name="type" id="type">
        <label for="price">Price:</label>
        <input type="text" name="price" id="price">
        <label for="availability">Availability:</label>
        <input type="text" name="availability" id="availability">
        <button type="submit">Create</button>
    </form>
@endsection