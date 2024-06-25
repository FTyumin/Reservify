@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-6">Cleaning Schedule Details</h1>

        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <p class="text-gray-800 font-semibold">Hotel: {{ $hotel->name }}</p>
            <p class="text-gray-800 font-semibold">Room Type: {{ $room->type }}</p>
            <p class="text-gray-800 font-semibold">Cleaning Date: {{ $cleaningSchedule->cleaning_date }}</p>
            <p class="text-gray-800 font-semibold">Employee ID: {{ $cleaningSchedule->employee_id }}</p>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('cleaning_schedules.index', ['hotel' => $hotel->id, 'room' => $room->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Back to Cleaning Schedules
            </a>
            <a href="{{ route('cleaning_schedules.edit', ['hotel' => $hotel->id, 'room' => $room->id, 'cleaningSchedule' => $cleaningSchedule->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Edit Schedule
            </a>

            <form action="{{ route('cleaning_schedules.destroy', ['hotel' => $hotel->id, 'room' => $room->id, 'cleaningSchedule' => $cleaningSchedule->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete Schedule
                </button>
            </form>
        </div>
    </div>
@endsection