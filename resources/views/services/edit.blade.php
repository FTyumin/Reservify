@extends('layouts.app')

@section('content')
    <h1>Edit Service</h1>
    <form action="{{ route('services.update', ['hotel' => $hotel->id, 'service' => $service->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $service->name }}">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="{{ $service->description }}">
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="{{ $service->price }}">
        <button type="submit">Update</button>
    </form>
@endsection