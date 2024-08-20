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
            <input type="text" id="date" name="date" value="{{ $today }}" class="mt-1 p-2 border border-gray-300 rounded-md w-max-content" readonly required>
            @error('date')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="credit_card_number" class="block text-sm font-medium text-gray-700">@lang('messages.credit_card_number')</label>
            <input type="text" id="credit_card_number"
             minlength="16" maxlength="19" name="credit_card_number" value="{{ old('credit_card_number') }}"
             placeholder="1234 5678 9012 3456"
               class="mt-1 p-2 border border-gray-300 rounded-md w-max-content" required>
            @error('credit_card_number')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="expiry_date" class="block text-sm font-medium">Expiry Date (MM/YY):</label>
<input type="text" id="expiry_date" name="expiry_date"
 placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/?([0-9]{2})" maxlength="5" required>

            @error('expiry_date')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="cvv" class="block text-sm font-medium text-gray-700">@lang('messages.cvv')</label>
            <input type="text" id="cvv" name="cvv" value="{{ old('cvv') }}" maxlength="4" class="mt-1 p-2 border border-gray-300 rounded-md w-max-content" required>
            @error('cvv')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">@lang('messages.email')</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 p-2 border border-gray-300 rounded-md w-max-content" required>
            @error('email')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            @lang('messages.create_payment')
        </button>
    </form>
</div>

<script>
    let today = new Date();
    let year = today.getFullYear();
    let month = today.getMonth() + 1;
    let day = today.getDate();

    document.getElementById('payment-form').addEventListener('submit', function(event) {
        const expiryDateInput = document.getElementById('expiry_date').value;
        const [inputMonth, inputYear] = expiryDateInput.split('/').map(Number);

        // Validate the expiry date
        if (inputYear < year || (inputYear === year && inputMonth < month)) {
            alert('Invalid expiry date. The card has expired.');
            event.preventDefault();
        } else if (inputMonth < 1 || inputMonth > 12) {
            alert('Invalid month in expiry date. Please enter a month between 01 and 12.');
            event.preventDefault();
        } else if (inputYear < year) {
            alert('Invalid year in expiry date. The year cannot be less than the current year.');
            event.preventDefault();
        }
    });

    // Correctly add the input event listener for formatting
    const expiryInput = document.getElementById('expiry_date');

    expiryInput.addEventListener('input', function(e) {
        let value = this.value.replace(/\D/g, ''); // Remove non-digit characters
        if (value.length > 2) {
            value = value.slice(0, 2) + '/' + value.slice(2); // Insert '/'
        } else {
            this.value = value;
        }
    });

    const cardNumberInput = document.getElementById('credit_card_number');

    cardNumberInput.addEventListener('input', function(e) {
        let value = this.value;
        // add space after every 4 digits
        value = value.replace(/(.{4})/g, '$1 ');
        // remove space at the end
        this.value = value.trim();
    })

    cardNumberInput.addEventListener('keydown', function(e){
        if(e.key === 'Backspace' && this.value.endsWith(' ')){
            this.value = this.value.slice(0,-1);
        }
    })
</script>

@endsection
