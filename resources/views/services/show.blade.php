@extends('layouts.app')

@section('content')
    <h1>Service Details</h1>
    <p>Name: {{ $service->name }}</p>
    <p>Description: {{ $service->description }}</p>
    <p>Price: {{ $service->price }}</p>
    <a href="{{ route('services.edit', $service->id) }}">Edit</a>
    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection