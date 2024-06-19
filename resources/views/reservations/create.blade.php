@extends('layouts.app')

@section('content')
    <h1>Create Reservation</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <label for="guest_id">Guest ID:</label>
        <input type="text" name="guest_id" id="guest_id">
        <label for="room_id">Room ID:</label>
        <input type="text" name="room_id" id="room_id">
        <label for="check_in_date">Check-in Date:</label>
        <input type="date" name="check_in_date" id="check_in_date">
        <label for="check_out_date">Check-out Date:</label>
        <input type="date" name="check_out_date" id="check_out_date">
        <button type="submit">Create</button>
    </form>
@endsection