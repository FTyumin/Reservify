@extends('layouts.app')

@section('content')
    <h1>Edit Review</h1>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" min="0" max="5" value="{{ $review->rating }}" required>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" required>{{ $review->comment }}</textarea>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
    </form>
@endsection