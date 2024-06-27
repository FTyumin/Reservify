@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">@lang('messages.create_payment_for_reservation', ['id' => $reservation->id])</h1>

    <p><strong>@lang('messages.total_price'):</strong> {{ $totalPrice }}€</p>
    
    <form action="{{ route('payments.store') }}" method="POST" id="payment-form">
        @csrf
        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
        <input type="hidden" name="amount" value="{{ $totalPrice }}">
        
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">@lang('messages.date')</label>
            <input type="text" id="date" name="date" value="{{ $today }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" readonly required>
            @error('date')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="credit_card_number" class="block text-sm font-medium text-gray-700">@lang('messages.credit_card_number')</label>
            <input type="text" id="credit_card_number" minlength="16" maxlength="16" name="credit_card_number" value="{{ old('credit_card_number') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
            @error('credit_card_number')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="expiry_date" class="block text-sm font-medium text-gray-700">@lang('messages.expiry_date') (MM/YY)</label>
            <input type="text" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="MM/YY" required>
            @error('expiry_date')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="cvv" class="block text-sm font-medium text-gray-700">@lang('messages.cvv')</label>
            <input type="text" id="cvv" name="cvv" value="{{ old('cvv') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
            @error('cvv')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">@lang('messages.email')</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
            @error('email')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('messages.create_payment')</button>
    </form>
</div>

<script>
    document.getElementById('payment-form').addEventListener('submit', function(event) {
        const expiryDateInput = document.getElementById('expiry_date').value;
        const [month, year] = expiryDateInput.split('/').map(Number);
        if(year==2024){
            if(month<5){
                alert('Invalid expiry date. The card has expired.');
                event.preventDefault();
            }
        }

        if (month < 1 || month > 12) {
            alert('Invalid month in expiry date. Please enter a month between 01 and 12.');
            event.preventDefault();
        } else if (year < 2024) {
            alert('Invalid year in expiry date. The year cannot be less than 2024.');
            event.preventDefault();
        }
    });
</script>
@endsection
