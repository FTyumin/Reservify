@extends('layouts.app')

@section('content')
    <h1>Edit Hotel</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $hotel->name }}" required>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="{{ $hotel->location }}" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $hotel->email }}" required>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ $hotel->phone }}" required>
        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" min="0" max="5" value="{{ $hotel->rating }}" required>
        <button type="submit">Update</button>
    </form>
@endsection