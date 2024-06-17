@extends('layouts.app')

@section('content')
    <h1>Reservations</h1>
    <a href="{{ route('reservations.create') }}">Create New Reservation</a>
    <ul>
        @foreach($reservations as $reservation)
            <li>
                <a href="{{ route('reservations.show', $reservation->id) }}">{{ $reservation->guest_id }} - {{ $reservation->room_id }}</a>
                <a href="{{ route('reservations.edit', $reservation->id) }}">Edit</a>
                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection