@extends('layouts.app')

@section('content')
    <h1>{{ __('messages.edit_reservation') }}</h1>
    <form action="{{ route('reservations.update', ['hotel' => $hotel->id, 'reservation' => $reservation->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="check_in">{{ __('messages.check_in') }}</label>
            <input type="date" id="check_in" name="check_in" value="{{ $reservation->check_in->format('Y-m-d') }}">
        </div>
        <div>
            <label for="check_out">{{ __('messages.check_out') }}</label>
            <input type="date" id="check_out" name="check_out" value="{{ $reservation->check_out->format('Y-m-d') }}">
        </div>
        <div>
            <label for="services">{{ __('messages.services') }}</label>
            <select multiple id="services" name="services[]">
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ in_array($service->id, $reservation->services->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">{{ __('messages.update_reservation') }}</button>
    </form>
@endsection