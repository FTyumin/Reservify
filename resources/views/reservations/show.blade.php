@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Reservation Details</h1>

    <div class="bg-white shadow-lg rounded-lg p-4 mb-4">
        <p><strong>Hotel Name:</strong> {{ $hotel->name }}</p>
        <p><strong>Room Type:</strong> {{ $reservation->room->type }}</p>
        <p><strong>Check-in Date:</strong> {{ $reservation->check_in }}</p>
        <p><strong>Check-out Date:</strong> {{ $reservation->check_out }}</p>
        <p><strong>Services:</strong> {{ $reservation->service }}</p>
    </div>

    <p class="text-gray-700 leading-relaxed mb-4">
        If you have any questions or need assistance, feel free to reach out to us. Our dedicated support team is here to help you with any inquiries you may have about your bookings or our services.
        You can contact us via email or phone. We aim to respond to all queries within 24 hours.
        <a href="{{ route('contact') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Contact Us</a>
    </p>

    <form action="{{ route('reservations.destroy', [$hotel->id, $reservation->id]) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
    </form>
</div>
@endsection