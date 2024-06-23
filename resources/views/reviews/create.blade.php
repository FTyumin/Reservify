@extends('layouts.app')

@section('content')
    <h1>Create Review for {{ $hotel->name }}</h1>
    <form action="{{ route('reviews.store', $hotel->id) }}" method="POST">
        @csrf
        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" min="0" max="5" required>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" required></textarea>
        <button type="submit">Create</button>
    </form>
@endsection