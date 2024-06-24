@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-2">{{ $hotel->name }}</h1>
        <p class="text-gray-600">Location: {{ $hotel->location }}</p>
        <p class="text-gray-600">Email: {{ $hotel->email }}</p>
        <p class="text-gray-600">Phone: {{ $hotel->phone }}</p>
        <p class="text-gray-600 mb-4">Rating: {{ $hotel->rating }}</p>
        
        @if($hotel->image)
            <img src="{{ asset('storage/' . $hotel->image) }}" alt="Hotel Image" class="mt-4 max-w-xs rounded-lg shadow">
        @endif

        <div class="flex space-x-4 mb-6">
            <a href="{{ route('reviews.index', $hotel->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Reviews
            </a>
            <a href="{{ route('hotels.edit', $hotel->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Edit
            </a>
            <a href="{{ route('hotels.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to list
            </a>
        </div>

        <h2 class="text-2xl font-semibold mb-4">Rooms</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($hotel->rooms as $room)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-4">
                        <a href="{{ route('rooms.show', ['hotel' => $hotel->id, 'room' => $room->id]) }}" class="text-lg text-blue-500 hover:text-blue-700 font-semibold">
                            {{ $room->type }}
                        </a>
                        <p class="text-gray-600 mt-2">Price per night: {{ $room->price }}€</p>
                    </div>
                </div>
            @endforeach
        </div>
        

        <a href="{{ route('rooms.create', ['hotel' => $hotel->id]) }}" class="mt-4 inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
            Create Room
        </a>
    </div>
</div>
@endsection
