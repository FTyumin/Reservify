@extends('layouts.app')

@section('content')
    <h1>Edit Review</h1>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="guest_id">Guest ID:</label>
        <input type="text" name="guest_id" id="guest_id" value="{{ $review->guest_id }}">
        <label for="hotel_id">Hotel ID:</label>
        <input type="text" name="hotel_id" id="hotel_id" value="{{ $review->hotel_id }}">
        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" min="0" max="5" value="{{ $review->rating }}">
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment">{{ $review->comment }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection