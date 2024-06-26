@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-2xl font-bold mb-6">Room Details</h1>

    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <p class="text-gray-800 font-semibold">Type: <span class="font-normal">{{ $room->type }}</span></p>
        <p class="text-gray-800 font-semibold">Price: <span class="font-normal">{{ $room->price }}</span></p>
        <p class="text-gray-800 font-semibold">Capacity: <span class="font-normal">{{ $room->capacity }}</span></p>
        <p class="text-gray-800 font-semibold">Description: <span class="font-normal">{{ $room->description }}</span></p>
        <p class="text-gray-800 font-semibold">Hotel: 
            <a href="{{ route('hotels.show', $hotel->id) }}" class="text-blue-500 hover:text-blue-700">{{ $hotel->name }}</a>
        </p>
        <p class="text-gray-800 font-semibold">Availability: 
            <span class="font-normal">
                {{ $room->is_available ? 'Yes' : 'No' }}
            </span>
        </p>

        @if($room->image)
            <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" class="mt-4 max-w-xs rounded-lg shadow">
        @endif
    </div>

    <div class="flex space-x-4">
        <a href="{{ route('hotels.show', ['hotel' => $hotel->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Return back to hotel 
        </a>
        <a href="{{ route('cleaning_schedules.index', ['hotel' => $hotel->id, 'room' => $room->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Cleaning Schedules
        </a>
        @if(auth()->check())
        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('employee'))
        <a href="{{ route('rooms.edit', ['hotel' => $hotel->id, 'room' => $room->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            Edit Room
        </a>
        
        @if(auth()->user()->hasRole('admin'))
            <form action="{{ route('rooms.destroy', ['hotel' => $hotel->id, 'room' => $room->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete
                </button>
            </form>
                @endif
            @endif
        @endif


    </div>
</div>
@endsection
