@extends('layouts.app')

@section('content')
    <h1>Create Hotel</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">{{ __('messages.hotel_name') }}:</label>
        <input type="text" name="name" id="name" required>

        <label for="location">{{ __('messages.location') }}:</label>
        <input type="text" name="location" id="location" required>

        <label for="email">{{ __('messages.email') }}:</label>
        <input type="email" name="email" id="email" required>

        <label for="phone">{{ __('messages.phone') }}:</label>
        <input type="text" name="phone" id="phone" required>

        <label for="image">{{ __('messages.image') }}:</label>
        <input type="file" name="image" id="image">

        <label for="description">{{ __('messages.description') }}:</label>
        <input type="text" name="description" id="description" required>

        <label for="rating">{{ __('messages.rating') }}:</label>
        <input type="number" name="rating" id="rating" min="0" max="5" required>

        <button type="submit">{{ __('messages.create_hotel') }}</button>
    </form>
@endsection