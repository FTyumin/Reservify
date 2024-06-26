@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ __('messages.create_service') }}</h1>
    <form action="{{ route('services.store', ['hotel' => $hotel->id]) }}" method="POST">
        @csrf
        <label for="name">{{ __('messages.name') }}:</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="description">{{ __('messages.description') }}:</label><br>
        <input type="text" name="description" id="description"><br>
        <label for="price">{{ __('messages.price') }}:</label><br>
        <input type="text" name="price" id="price"><br><br>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('messages.create') }}</button>
    </form>
@endsection