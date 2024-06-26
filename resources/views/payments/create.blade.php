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
            <input type="date" id="date" name="date" value="{{ old('date') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            @error('date')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
            <input type="text" id="payment_method" name="payment_method" value="{{ old('payment_method') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            @error('payment_method')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <input type="text" id="status" name="status" value="{{ old('status') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            @error('status')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Payment</button>
    </form>
</div>
@endsection