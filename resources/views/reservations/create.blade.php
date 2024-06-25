@extends('layouts.app')

@section('content')
    <h1>Create Reservation</h1>
    <form action="{{ route('reservations.store', ['hotel' => $hotel->id, 'room' => $room->id]) }}" method="POST">
        @csrf
        <div>
            <label for="check_in">Check In</label>
            <input type="date" id="check_in" name="check_in" min="date('Y-m-d')">
        </div>
        <div>
            <label for="check_out">Check Out</label>
            <input type="date" id="check_out" name="check_out">
        </div>
        <div>
            <label for="is_active">Is Active</label>
            <input type="checkbox" id="is_active" name="is_active" value="1">
        </div>
        <div>
            <label for="services">Services</label>
            <select multiple id="services" name="services[]">
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Save Reservation</button>
    </form>
@endsection
