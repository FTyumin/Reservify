@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Profile</h1>

    {{-- <input type="hidden" name="user_id" value="{{ Auth::id() }}"> --}}
    
    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <h2 class="text-xl font-semibold mb-2">User Information</h2>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-2">My Reservations</h2>
        @if($reservations->isEmpty())
            <p class="text-gray-600">You have no reservations.</p>
        @else
            <ul class="space-y-4">
                @foreach($reservations as $reservation)
                    <li class="bg-gray-100 rounded-lg p-4 shadow-sm">
                        <p><strong>Hotel:</strong> {{ $reservation->hotel->name }}</p>
                        <p><strong>Room:</strong> {{ $reservation->room->name }}</p>
                        <p><strong>Check-in Date:</strong> {{ $reservation->check_in->format('Y-m-d') }}</p>
                        <p><strong>Check-out Date:</strong> {{ $reservation->check_out->format('Y-m-d') }}</p>
                        <p><strong>Status:</strong> {{ $reservation->is_active ? 'Active' : 'Inactive' }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
