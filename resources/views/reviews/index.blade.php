@extends('layouts.app')

@section('content')
    <h1>Reviews</h1>
    <a href="{{ route('reviews.create') }}">Create New Review</a>
    <ul>
        @foreach($reviews as $review)
            <li>
                <a href="{{ route('reviews.show', $review->id) }}">{{ $review->guest_id }} - {{ $review->hotel_id }}</a>
                <a href="{{ route('reviews.edit', $review->id) }}">Edit</a>
                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection