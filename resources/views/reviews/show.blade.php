@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">@lang('messages.review_details')</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <p class="text-gray-700"><span class="font-bold">@lang('messages.guest'):</span> {{ $review->user->name }}</p>
        <p class="text-gray-700"><span class="font-bold">@lang('messages.hotel'):</span> {{ $review->hotel->name }}</p>
        <p class="text-gray-700"><span class="font-bold">@lang('messages.rating'):</span> {{ $review->rating }}</p>
        <p class="text-gray-700"><span class="font-bold">@lang('messages.comment'):</span> {{ $review->comment }}</p>
    </div>
    <div class="flex space-x-4 mb-6">
        <a href="{{ route('reviews.edit', $review->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">@lang('messages.edit')</a>
        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">@lang('messages.delete')</button>
        </form>
        <a href="{{ route('reviews.index', $review->hotel_id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">@lang('messages.back_to_list')</a>
    </div>
@endsection