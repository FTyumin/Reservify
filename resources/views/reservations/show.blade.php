@extends('layouts.app')

@section('content')
    <h1>Reservation Details</h1>
    <p>Guest ID: {{ $reservation->guest_id }}</p>
    <p>Room ID: {{ $reservation->room_id }}</p>
    <p>Check-in Date: {{ $reservation->check_in_date }}</p>
    <p>Check-out Date: {{ $reservation->check_out_date }}</p>
    <a href="{{ route('reservations.edit', $reservation->id) }}">Edit</a>
    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection