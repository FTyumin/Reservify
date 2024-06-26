@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ __('messages.service_details') }}</h1>
    <div class="bg-white shadow-md rounded p-6 mb-6">
        <p><span class="font-bold">{{ __('messages.name') }}:</span> {{ $service->name }}</p>
        <p><span class="font-bold">{{ __('messages.description') }}:</span> {{ $service->description }}</p>
        <p><span class="font-bold">{{ __('messages.price') }}:</span> {{ $service->price }}</p>
    </div>
    <div class="flex space-x-4 mb-6">
        <a href="{{ route('hotels.show', ['hotel' => $hotel->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ __('messages.return_to_hotel') }}</a>
        <a href="{{ route('services.edit', ['hotel' => $hotel->id, 'service' => $service->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">{{ __('messages.edit') }}</a>
        <form action="{{ route('services.destroy', ['hotel' => $hotel->id, 'service' => $service->id]) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('messages.delete') }}</button>
        </form>
    </div>
@endsection