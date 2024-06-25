@extends('layouts.app')

@section('content')
    <h1>Reservations</h1>
    <ul>
        @foreach($reservations as $reservation)
            <li>{{ $reservation->id }} - <a href="{{ route('reservations.show', ['hotel' => $reservation->hotel_id, 'reservation' => $reservation->id]) }}">View</a> | 
                <a href="{{ route('reservations.edit', ['hotel' => $reservation->hotel_id, 'reservation' => $reservation->id]) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection
