@extends('layouts.app')

@section('content')
    <h1>Review Details</h1>
    <p>Guest ID: {{ $review->guest_id }}</p>
    <p>Hotel ID: {{ $review->hotel_id }}</p>
    <p>Rating: {{ $review->rating }}</p>
    <p>Comment: {{ $review->comment }}</p>
    <a href="{{ route('reviews.edit', $review->id) }}">Edit</a>
    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection