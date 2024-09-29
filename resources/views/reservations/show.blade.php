@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 min-h-screen flex flex-col ">
    <h1 class="text-2xl font-semibold mb-4">@lang('messages.reservation_details')</h1>

    <div class="bg-white shadow-lg rounded-lg p-4 mb-4 flex flex-col justify-between h-full gap-4" >
        <p><strong>@lang('messages.hotel_name'):</strong> {{ $hotel->name }}</p>
        <p><strong>@lang('messages.room_type'):</strong> {{ $reservation->room->type }}</p>
        <p><strong>@lang('messages.check_in'):</strong> {{ $reservation->check_in->format('d/m/Y') }}</p>
        <p><strong>@lang('messages.check_out'):</strong> {{ $reservation->check_out->format('d/m/Y') }}</p>
        @if($reservation->service)
        <p><strong>@lang('messages.services'):</strong> {{ $reservation->service }}</p>

        @else
        <p><strong>@lang('messages.no_services')</strong></p>
        @endif
    </div>

    <p class="text-gray-700 leading-relaxed mb-4">
        @lang('messages.help_text')
        <a href="{{ route('contact') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('messages.contact_us_title')</a>
    </p>

    @if(auth()->check() && auth()->user()->hasRole('admin'))
    <form action="{{ route('reservations.destroy', [$hotel->id, $reservation->id]) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">@lang('messages.delete')</button>
    </form>
    @endif	
</div>
@endsection