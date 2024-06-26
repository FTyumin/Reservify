@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">@lang('messages.create_service')</h1>
    <form action="{{ route('services.store', ['hotel' => $hotel->id]) }}" method="POST">
        @csrf
        <label for="name">@lang('messages.name'):</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="description">@lang('messages.description'):</label><br>
        <input type="text" name="description" id="description"><br>
        <label for="price">@lang('messages.price'):</label><br>
        <input type="text" name="price" id="price"><br><br>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('messages.create')</button>
    </form>
@endsection