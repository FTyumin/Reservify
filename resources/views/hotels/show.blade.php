@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-2">{{ $hotel->name }}</h1>
        <p class="text-gray-600">@lang('messages.location'): {{ $hotel->location }}</p>
        <p class="text-gray-600">@lang('messages.email'): {{ $hotel->email }}</p>
        <p class="text-gray-600">@lang('messages.phone'): {{ $hotel->phone }}</p>
        @if($hotel->reviews->count()>1)
            @if($averageRating)
                <p class="text-gray-600 mb-4">@lang('messages.rating'): {{ number_format($averageRating, 1) }} (based on {{ $hotel->reviews->count() }} reviews)</p>
            @else
                <p class="text-gray-600 mb-4">@lang('messages.rating'): {{ $hotel->rating }}</p>
            @endif
        @else
        <p class="text-gray-600 mb-4">@lang('messages.rating'): {{ number_format($averageRating, 1) }}
        @endif


        @if($hotel->image)
            <img src="{{ asset('storage/' . $hotel->image) }}" alt="Hotel Image" class="mt-4 max-w-xs rounded-lg shadow">
        @endif

        <div class="flex space-x-4 mb-6">
            <a href="{{ route('reviews.index', $hotel->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                @lang('messages.reviews')
            </a>

            @if(auth()->check() && auth()->user()->can('edit-hotels'))
                <a href="{{ route('hotels.edit', $hotel->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    @lang('messages.edit')
                </a>
            @endif

            <a href="{{ route('hotels.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                @lang('messages.back_list')
            </a>
        </div>

        <h2 class="text-2xl font-semibold mb-4">@lang('messages.rooms')</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($hotel->rooms as $key => $room)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-4">
                        <a href="{{ route('rooms.show', ['hotel' => $hotel->id, 'room' => $room->id]) }}" class="text-lg text-blue-500 hover:text-blue-700 font-semibold">
                            {{ $room->type }}
                        </a>
                        <p class="text-gray-600 mt-2">@lang('messages.price_night'): {{ $room->price }}€</p>

                        <a href="{{ route('reservations.create', ['hotel' => $hotel->id, 'room' => $room->id]) }}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            @lang('messages.book_now')
                        </a>

                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="text-2xl font-semibold mb-4">@lang('messages.services')</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($hotel->services as $service)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-4">
                        <a href="{{ route('services.show', ['hotel' => $hotel->id, 'service' => $service->id]) }}" class="text-lg text-blue-500 hover:text-blue-700 font-semibold">
                            {{ $service->name }}
                        </a>
                        <p class="text-gray-600 mt-2">Price: {{ $service->price }}€</p>
                        <p class="text-gray-600 mt-2">Description: {{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        @if(auth()->check() && auth()->user()->hasRole('admin'))
            <a href="{{ route('rooms.create', ['hotel' => $hotel->id]) }}" class="mt-4 inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                @lang('messages.create_room')
            </a>
            <a href="{{ route('services.create', ['hotel' => $hotel->id]) }}" class="mt-4 inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                @lang('messages.create_service')
            </a>
        @endif
    </div>
</div>
@endsection