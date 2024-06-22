@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-2">{{ $hotel->name }}</h1>
        <p class="text-gray-600">Location: {{ $hotel->location }}</p>
        <p class="text-gray-600">Email: {{ $hotel->email }}</p>
        <p class="text-gray-600">Phone: {{ $hotel->phone }}</p>
        <p class="text-gray-600 mb-4">Rating: {{ $hotel->rating }}</p>

        <div class="flex space-x-4 mb-6">
            <a href="{{ route('hotels.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to list
            </a>
            <a href="{{ route('hotels.edit', $hotel->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Edit
            </a>
        </div>

        <h2 class="text-xl font-semibold mb-2">Rooms</h2>
        <ul class="list-disc pl-5">
            @foreach ($hotel->rooms as $room)
                <li class="mb-1">
                    <a href="{{ route('rooms.show', ['hotel' => $hotel->id, 'room' => $room->id]) }}" class="text-blue-500 hover:text-blue-700">
                        {{ $room->type }}
                    </a> - 
                    <span class="text-gray-600">{{ $room->price }}</span>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('rooms.create', ['hotel' => $hotel->id]) }}" class="mt-4 inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
            Create Room
        </a>
    </div>
</div>
@endsection
