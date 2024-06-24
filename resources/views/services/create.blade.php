@extends('layouts.app')

@section('content')
    <h1>Create Service</h1>
    <form action="{{ route('services.store', ['hotel' => $hotel->id]) }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
        <label for="price">Price:</label>
        <input type="text" name="price" id="price">
        <button type="submit">Create</button>
    </form>
@endsection