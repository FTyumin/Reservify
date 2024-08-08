@extends('layouts.app')

@section('content')
    <h1 class="text-2xl">@lang('messages.create_reservation')</h1>
    <form action="{{ route('reservations.store', ['hotel' => $hotel->id, 'room' => $room->id]) }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

        <div class="mb-4">
            <label for="check_in" class="block text-gray-700 text-lg font-bold mb-2">@lang('messages.check_in')</label>
            <input type="date" name="check_in" id="check_in" class="shadow appearance-none border rounded w-min py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="check_out" class="block text-gray-700 text-lg font-bold mb-2">@lang('messages.check_out')</label>
            <input type="date" name="check_out" id="check_out" class="shadow appearance-none border rounded w-min py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="services" class="block text-gray-700 text-lg font-bold mb-2">@lang('messages.services')</label>
            <select name="services[]" id="services" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
                <option value="" disabled>@lang('messages.select_service')</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">@lang('messages.book_now')</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkInInput = document.getElementById('check_in');
            var checkOutInput = document.getElementById('check_out');
            var today = new Date();
            var tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);

            var day = ("0" + tomorrow.getDate()).slice(-2);
            var month = ("0" + (tomorrow.getMonth() + 1)).slice(-2);
            var tomorrowDate = tomorrow.getFullYear() + "-" + (month) + "-" + (day);

            checkInInput.min = tomorrowDate;
            checkInInput.value = tomorrowDate;

            checkInInput.addEventListener('change', function() {
                var checkInDate = new Date(this.value);
                var nextDay = new Date(checkInDate);
                nextDay.setDate(nextDay.getDate() + 1);

                var day = ("0" + nextDay.getDate()).slice(-2);
                var month = ("0" + (nextDay.getMonth() + 1)).slice(-2);
                var nextDayDate = nextDay.getFullYear() + "-" + (month) + "-" + (day);

                checkOutInput.min = nextDayDate;
                if (checkOutInput.value < nextDayDate) {
                    checkOutInput.value = nextDayDate;
                }
            });

            checkOutInput.min = tomorrowDate;
        });
    </script>
@endsection
