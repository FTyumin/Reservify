@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Review Details</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <p class="text-gray-700"><span class="font-bold">Guest:</span> {{ $review->user->name }}</p>
        <p class="text-gray-700"><span class="font-bold">Hotel:</span> {{ $review->hotel->name }}</p>
        <p class="text-gray-700"><span class="font-bold">Rating:</span> {{ $review->rating }}</p>
        <p class="text-gray-700"><span class="font-bold">Comment:</span> {{ $review->comment }}</p>
    </div>
    <div class="flex space-x-4 mb-6">
        <a href="{{ route('reviews.edit', $review->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
        <a href="{{ route('reviews.index', $review->hotel_id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
    </div>
@endsection