@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">@lang('messages.reservation_details')</h1>

        <div class="reservation-list">
            @foreach($reservations as $reservation)
                <div class="reservation-item bg-white shadow-lg rounded-lg p-4 mb-4">
                    <p class="text-gray-700">@lang('messages.reservation_id', ['id' => $reservation->id])</p>
                    <div class="flex mt-2">
                        <a href="{{ route('reservations.show', ['hotel' => $reservation->hotel_id, 'reservation' => $reservation->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">@lang('messages.view')</a>
                    </div>
                </div>
            @endforeach

            @if($reservations->isEmpty())
                <p class="text-gray-700">@lang('messages.no_reservations_found')</p>
            @endif
        </div>
    </div>
@endsection
