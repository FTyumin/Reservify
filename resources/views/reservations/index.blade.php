@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Reservations</h1>

        <div class="reservation-list">
            @foreach($reservations as $reservation)
                <div class="reservation-item bg-white shadow-lg rounded-lg p-4 mb-4">
                    <p class="text-gray-700">Reservation ID: {{ $reservation->id }}</p>
                    <div class="flex mt-2">
                        <a href="{{ route('reservations.show', ['hotel' => $reservation->hotel_id, 'reservation' => $reservation->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                    </div>
                </div>
            @endforeach

            @if($reservations->isEmpty())
                <p class="text-gray-700">No reservations found.</p>
            @endif
        </div>
    </div>
@endsection
