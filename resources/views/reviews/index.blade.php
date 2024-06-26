@extends('layouts.app')

@section('content')
    <div class="flex space-x-4 mb-6">
        <a href="{{ route('reviews.create', $hotel->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            @lang('messages.create_new_review')
        </a>
        <a href="{{ route('hotels.show', $hotel) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            @lang('messages.back_to') {{ $hotel->name }}
        </a>
    </div>
    <h1 class="text-2xl font-bold mb-4">@lang('messages.reviews_for') {{ $hotel->name }}</h1>
    <ul class="list-disc pl-5">
        @foreach($reviews as $review)
            <li class="mb-2">
                <a href="{{ route('reviews.show', $review->id) }}" class="text-blue-500 hover:text-blue-700">
                    @lang('messages.inspect_review_from') {{ $review->user->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection