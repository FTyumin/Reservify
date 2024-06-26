@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Create Payment for Reservation #{{ $reservation->id }}</h1>

        <p><strong>Total Price:</strong> {{ $totalPrice }}€</p>
        
        <form action="{{ route('payments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
            <input type="hidden" name="amount" value="{{ $totalPrice }}">
            
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="text" id="date" name="date" value="{{ $today }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" readonly required>                @error('date')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="credit_card_number" class="block text-sm font-medium text-gray-700">Credit Card Number</label>
                <input type="text" id="credit_card_number" name="credit_card_number" value="{{ old('credit_card_number') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('credit_card_number')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="expiry_date" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('expiry_date')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
                <input type="text" id="cvv" name="cvv" value="{{ old('cvv') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('cvv')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('email')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Payment</button>
        </form>
    </div>
@endsection