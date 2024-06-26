@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">My Profile</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 border-green-300 border px-4 py-2 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg p-4">
        <h2 class="text-xl font-semibold mb-2">My Reservations</h2>
        @if($reservations->isEmpty())
            <p>You have no reservations.</p>
        @else
            <ul>
                @foreach($reservations as $reservation)
                    <li>
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <strong>Reservation #{{ $reservation->id }}:</strong>
                                <a href="{{ route('reservations.show', ['hotel' => $reservation->hotel_id, 'reservation' => $reservation->id]) }}" class="text-blue-500 hover:underline">View</a>
                                {{ $reservation->details }} ({{ $reservation->created_at->format('d M Y') }})
                                @if(session('paid_reservations') && in_array($reservation->id, session('paid_reservations')))
                                    <span class="text-green-600 ml-2">(Payment successful)</span>
                                @endif
                            </div>
                            @if(!session('paid_reservations') || !in_array($reservation->id, session('paid_reservations')))
                                <a href="{{ route('payments.create', $reservation->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Make Payment</a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">
            {{ __('Logout') }}
        </button>
    </form>
    
</div>
@endsection