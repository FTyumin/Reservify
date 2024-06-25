@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Book a Room at {{ $hotel->name }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservations.store', $hotel->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label for="room_id" class="block text-gray-700 text-sm font-bold mb-2">Room</label>
            <select name="room_id[]" id="room_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->type }}</option>
                @endforeach
            </select>
        </div>

        <!-- Hidden guest_id field -->
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <div class="mb-4">
            <label for="check_in" class="block text-gray-700 text-sm font-bold mb-2">Check-in Date</label>
            <input type="date" name="check_in" id="check_in" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="check_out" class="block text-gray-700 text-sm font-bold mb-2">Check-out Date</label>
            <input type="date" name="check_out" id="check_out" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="is_active" class="block text-gray-700 text-sm font-bold mb-2">Active</label>
            <select name="is_active" id="is_active" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="services" class="block text-gray-700 text-sm font-bold mb-2">Services</label>
            <select name="services[]" id="services" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
                <option value="" disabled>Select services</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Book Now</button>
        </div>
    </form>
@endsection