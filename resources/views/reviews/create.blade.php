@extends('layouts.app')

@section('content')
    <h1>Create Review</h1>
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <label for="guest_id">Guest ID:</label>
        <input type="text" name="guest_id" id="guest_id">
        <label for="hotel_id">Hotel ID:</label>
        <input type="text" name="hotel_id" id="hotel_id">
        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" min="0" max="5">
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment"></textarea>
        <button type="submit">Create</button>
    </form>
@endsection