@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">@lang('messages.reservation_details')</h1>

    <div class="bg-white shadow-lg rounded-lg p-4 mb-4">
        <p><strong>@lang('messages.hotel_name'):</strong> {{ $hotel->name }}</p>
        <p><strong>@lang('messages.room_type'):</strong> {{ $reservation->room->type }}</p>
        <p><strong>@lang('messages.check_in'):</strong> {{ $reservation->check_in }}</p>
        <p><strong>@lang('messages.check_out'):</strong> {{ $reservation->check_out }}</p>
        <p><strong>@lang('messages.services'):</strong> {{ $reservation->service }}</p>
    </div>

    <p class="text-gray-700 leading-relaxed mb-4">
        @lang('messages.help_text')
        <a href="{{ route('contact') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Contact Us</a>
    </p>

    <form action="{{ route('reservations.destroy', [$hotel->id, $reservation->id]) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">@lang('messages.delete')</button>
    </form>
</div>
@endsection