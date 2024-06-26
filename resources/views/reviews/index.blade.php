@extends('layouts.app')

@section('content')

    <div class="flex space-x-4 mb-6">
        @if(auth()->check())
        
        <a href="{{ route('reviews.create', $hotel->id) }}" class="mt-4 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            @lang('messages.create_new_review')
        </a>
        @endif
        <a href="{{ route('hotels.show', $hotel) }}" class="mt-6 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            @lang('messages.back_to') {{ $hotel->name }}
        </a>
    </div>
    
    <h1 class="text-2xl font-bold mb-4">@lang('messages.reviews_for') {{ $hotel->name }}</h1>
    <ul class="list-none pl-5 max-w-xl mx-auto">
        @foreach($reviews as $review)
            <li class="mb-4 p-4 bg-gray-100 rounded-md shadow-md">
                <div class="flex justify-between items-center mb-2">
                    <a href="{{ route('reviews.show', $review->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                        @lang('messages.inspect_review_from') {{ $review->user->name }}
                    </a>
                    <p>{{$review->comment}}</p>
                    <span class="text-sm text-gray-500">{{ $review->created_at->format('d M Y') }}</span>
                    
                </div>
                <p class="text-gray-700">{{ $review->content }}</p>
                <div class="mt-2 text-sm text-yellow-500">
                    @for ($i = 0; $i < $review->rating; $i++)
                        ★
                    @endfor
                </div>
            </li>
        @endforeach
    </ul>
@endsection