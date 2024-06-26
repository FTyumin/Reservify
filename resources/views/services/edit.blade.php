@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ __('messages.edit_service') }}</h1>
    <form action="{{ route('services.update', ['hotel' => $hotel->id, 'service' => $service->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">{{ __('messages.name') }}:</label><br>
        <input type="text" name="name" id="name" value="{{ $service->name }}"><br>
        <label for="description">{{ __('messages.description') }}:</label><br>
        <input type="text" name="description" id="description" value="{{ $service->description }}"><br>
        <label for="price">{{ __('messages.price') }}:</label><br>
        <input type="text" name="price" id="price" value="{{ $service->price }}"><br><br>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('messages.update') }}</button>
    </form>
@endsection