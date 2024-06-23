@extends('layouts.app')

@section('content')
    <h1>Review Details</h1>
    <p>Guest: {{ $review->user->name }}</p>
    <p>Hotel: {{ $review->hotel->name }}</p>
    <p>Rating: {{ $review->rating }}</p>
    <p>Comment: {{ $review->comment }}</p>
    <a href="{{ route('reviews.edit', $review->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
    </form>
    <div class="flex space-x-4 mb-6">
        <a href="{{ route('reviews.index', $review->hotel_id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            Back to List
        </a>
    </div>
@endsection