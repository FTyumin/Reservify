@extends('layouts.app')

@section('content')

<div class="flex items-center flex-col container mx-auto p-4">
    

    <h1 class="text-2xl font-semibold mb-4">@lang('messages.create_payment_for_reservation', ['id' => $reservation->id])</h1>

    <p><strong>@lang('messages.total_price'):</strong> {{ $totalPrice }}€</p>
    
    <form action="{{ route('payments.store') }}" method="POST" id="payment-form" class="a">
        @csrf
        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
        <input type="hidden" name="amount" value="{{ $totalPrice }}">
        
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">@lang('messages.date')</label>
            <input type="text" id="date" name="date" value="{{ $today }}"
             class="mt-1 p-2 border border-gray-300 rounded-md w-max-content" readonly required>
            @error('date')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="credit_card_number"
             class="block text-sm font-medium text-gray-700">@lang('messages.credit_card_number')
            </label>
            <input type="text" id="credit_card_number"
             minlength="16" maxlength="19" name="credit_card_number" 
             value="{{ $creditCardNumber }}"
             placeholder="1234 5678 9012 3456"
               class="mt-1 p-2 border border-gray-300 rounded-md w-max-content" required>
               
            @error('credit_card_number')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="exp">
            <label for="expiry_month" class="block text-sm font-medium">Expiry Date (MM/YY):</label>
            <input autocomplete="off" class="exp" id="expiry_month" name="expiry_month" maxlength="2" max="12" pattern="[0-9]*"
             inputmode="numerical" placeholder="MM" type="text" data-pattern-validate required/>

             <label for="expiry_year" class="block text-sm font-medium">Expiry Date (MM/YY):</label>
             <input autocomplete="off" class="exp" id="expiry_year" name="year" maxlength="4" max="29" pattern="[0-9]*"
              inputmode="numerical" placeholder="YYYY" type="text" data-pattern-validate required/>
        </div>

        <div class="mb-4">
            <label for="cvv" class="block text-sm font-medium text-gray-700">@lang('messages.cvv')</label>
            <input type="text" id="cvv" name="cvv" value="{{ old('cvv') }}" placeholder="123"
            maxlength="4" class="mt-1 p-2 border border-gray-300 rounded-md w-max-content" required>
            @error('cvv')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">@lang('messages.email')</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
             class="mt-1 p-2 border border-gray-300 rounded-md w-max-content" required>
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

// function to format credit card input, from stackoverflow
function cc_format(value) {
        var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        var matches = v.match(/\d{4,16}/g);
        var match = (matches && matches[0]) || '';
        var parts = [];

        for (var i = 0, len = match.length; i < len; i += 4) {
            parts.push(match.substring(i, i + 4));
        }

        if (parts.length) {
            return parts.join(' ');
        } else {
            return value;
        }
    }

let today = new Date();
let year = today.getFullYear();
let month = today.getMonth() + 1;
let day = today.getDate();

document.getElementById('payment-form').addEventListener('submit', function(event) {
    const expiryMonth = document.getElementById('expiry_month').value;
    const expiryYear = document.getElementById('expiry_year').value;
    const expiryDateInput = `${expiryMonth}/${expiryYear}`;
    const expiryDateHiddenField = document.createElement('input');
    expiryDateHiddenField.setAttribute('type', 'hidden');
    expiryDateHiddenField.setAttribute('name', 'expiry_date');
    expiryDateHiddenField.setAttribute('value', expiryDateInput);

    this.appendChild(expiryDateHiddenField);

    // Validate the expiry date
    if (expiryYear < year || (expiryYear === year && expiryMonth < month)) {
        alert('Invalid expiry date. The card has expired.');
        event.preventDefault();
    } else if (expiryMonth < 1 || expiryMonth > 12) {
        alert('Invalid month in expiry date. Please enter a month between 01 and 12.');
        event.preventDefault();
    } 
});

// Correctly add the input event listener for formatting
// const expiryInput = document.getElementById('expiry_date');

// expiryInput.addEventListener('input', function(e) {
//     let value = this.value.replace(/\D/g, ''); // Remove non-digit characters
//     if (value.length > 2) {
//         value = value.slice(0, 2) + '/' + value.slice(2); // Insert '/'
//     } else {
//         this.value = value;
//     }
// });

const cardNumberInput = document.getElementById('credit_card_number');


cardNumberInput.addEventListener('input', function(e) {
    this.value = cc_format(this.value);
})
    

cardNumberInput.addEventListener('keydown', function(e){
    if(e.key === 'Backspace' && this.value.endsWith(' ')){
        this.value = this.value.slice(0,-1);
    }
})
</script>

@endsection
