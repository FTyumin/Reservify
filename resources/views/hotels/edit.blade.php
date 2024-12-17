@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-2xl font-bold mb-6">@lang('messages.edit_hotel')</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">@lang('messages.correct_errors')</strong>
            <ul class="list-disc pl-6 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotels.update', $hotel) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PATCH')
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">@lang('messages.hotel_name'):</label>
            <input type="text" name="name" id="name" value="{{ $hotel->name }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">@lang('messages.location'):</label>
            <input type="text" name="location" id="location" value="{{ $hotel->location }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">@lang('messages.email'):</label>
            <input type="email" name="email" id="email" value="{{ $hotel->email }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">@lang('messages.phone'):</label>
            <input type="text" name="phone" id="phone" value="{{ $hotel->phone }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="rating" class="block text-sm font-medium text-gray-700">@lang('messages.rating'):</label>
            <input type="number" name="rating" id="rating" value="{{ $hotel->rating }}" min="0" max="5" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">@lang('messages.image'):</label>
            <input type="file" name="image" id="image" 
                   class="mt-1 block w-full px-3 py-2 file:border file:border-gray-300 file:rounded file:text-sm file:px-5 file:py-2 file:bg-white file:text-gray-700 hover:file:bg-gray-50">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">@lang('messages.description')</label>
            <input type="text" name="description" id="description" value="{{ $hotel->description }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            @lang('messages.update')
        </button>
    </form>
</div>
@endsection
