@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">@lang('messages.my_profile')</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 border-green-300 border px-4 py-2 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg p-4">
        <h2 class="text-xl font-semibold mb-2">@lang('messages.my_reservations')</h2>
        @if($reservations->isEmpty())
            <p>@lang('messages.no_reservations')</p>
        @else
            <ul>
                @foreach($reservations as $reservation)
                    <li>
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <strong>@lang('messages.reservation_number', ['id' => $reservation->id]):</strong>
                                <a href="{{ route('reservations.show', ['hotel' => $reservation->hotel_id, 'reservation' => $reservation->id]) }}" class="text-blue-500 hover:underline">@lang('messages.view')</a>
                                {{ $reservation->details }} ({{ $reservation->created_at->format('d M Y') }})
                                @if(session('paid_reservations') && in_array($reservation->id, session('paid_reservations')))
                                    <span class="text-green-600 ml-2">(@lang('messages.payment_successful'))</span>
                                @endif
                            </div>
                            @if(!session('paid_reservations') || !in_array($reservation->id, session('paid_reservations')))
                                <a href="{{ route('payments.create', $reservation->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('messages.make_payment')</a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mt-4">
        <h2 class="text-xl font-semibold mb-2">@lang('messages.language_preference')</h2>
        <form action="{{ route('locale', app()->getLocale()) }}" method="POST" class="flex items-center">
            @csrf
            <label for="language" class="mr-2">@lang('messages.select_language')</label>
            <select name="lang" id="language" onchange="this.form.submit()" class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:border-blue-500">
                <option value="en" @if(app()->getLocale() == 'en') selected @endif>English</option>
                <option value="lv" @if(app()->getLocale() == 'lv') selected @endif>Latvian</option>
                <option value="ru" @if(app()->getLocale() == 'ru') selected @endif>Russian</option>
            </select>
            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('messages.change_language')</button>
        </form>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">
            @lang('messages.logout')
        </button>
    </form>
</div>
@endsection