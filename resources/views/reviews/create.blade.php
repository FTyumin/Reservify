@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4 ml-4">@lang('messages.review_for') {{ $hotel->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{-- <div class="flex justify-between items-center"> --}}
    <form action="{{ route('reviews.store', $hotel->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4  flex justify-between items-center flex-col">
        @csrf

        <div class="mb-4">
            <label for="rating" class="block text-gray-700 text-3xl font-bold mb-2">@lang('messages.rating'):</label>
            <input type="number" name="rating" id="rating" min="0" max="5" required 
            class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-max">
        </div>

        <div class="mb-4">
            <label for="comment" class="block text-gray-700 text-3xl font-bold mb-2">@lang('messages.comment'):</label>
            <textarea name="comment" id="comment" required class="shadow appearance-none border rounded w-3/4 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">@lang('messages.create')</button>
        </div>
    </form>
{{-- </div> --}}
    
@endsection