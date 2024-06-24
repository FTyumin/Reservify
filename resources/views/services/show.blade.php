@extends('layouts.app')

@section('content')
    <h1>Service Details</h1>
    <p>Name: {{ $service->name }}</p>
    <p>Description: {{ $service->description }}</p>
    <p>Price: {{ $service->price }}</p>
    <div class="flex space-x-4">
        <a href="{{ route('hotels.show', ['hotel' => $hotel->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Return back to hotel 
        </a>
        <a href="{{ route('services.edit', ['hotel' => $hotel->id, 'service' => $service->id]) }}">Edit</a>
        <form action="{{ route('services.destroy', ['hotel' => $hotel->id, 'service' => $service->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection