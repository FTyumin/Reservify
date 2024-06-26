@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">My Profile</h1>

    <div class="bg-white shadow-lg rounded-lg p-4 mb-4">
        <h2 class="text-xl font-semibold mb-2">Profile Information</h2>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-4">
        <h2 class="text-xl font-semibold mb-2">My Reservations</h2>
        @if($reservations->isEmpty())
            <p>You have no reservations.</p>
        @else
            <ul>
                @foreach($reservations as $reservation)
                    <li>
                        <a href="{{ route('reservations.show', [$reservation->hotel->id, $reservation->id]) }}">
                            <strong>Reservation #{{ $reservation->id }}:</strong>
                            {{ $reservation->details }} ({{ $reservation->created_at->format('d M Y') }})
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection