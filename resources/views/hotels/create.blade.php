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

    <form action="{{ route('hotels.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required>
        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" min="0" max="5" required>
        <button type="submit">Create</button>
    </form>
@endsection