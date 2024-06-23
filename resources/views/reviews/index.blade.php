@extends('layouts.app')

@section('content')
    <div class="flex space-x-4 mb-6">
        <a href="{{ route('reviews.create', $hotel->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            Create New Review
        </a>
        <a href="{{ route('hotels.show', $hotel) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Back to {{ $hotel->name }}
        </a>
    </div>
    <h1>Reviews for {{ $hotel->name }}</h1>
    <ul>
        @foreach($reviews as $review)
            <li>
                <a href="{{ route('reviews.show', $review->id) }}">Inspect review from {{ $review->user->name }}</a>
                <br>
            </li>
        @endforeach
    </ul>
@endsection