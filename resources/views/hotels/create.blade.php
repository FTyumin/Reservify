@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">@lang('messages.create_hotel')</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 border border-red-400 rounded p-4 mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">@lang('messages.hotel_name'):</label>
            <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">@lang('messages.location'):</label>
            <input type="text" name="location" id="location" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">@lang('messages.email'):</label>
            <input type="email" name="email" id="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">@lang('messages.phone'):</label>
            <input type="text" name="phone" id="phone" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">@lang('messages.image'):</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">@lang('messages.description'):</label>
            <textarea name="description" id="description" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
        </div>

        <div>
            <label for="rating" class="block text-sm font-medium text-gray-700">@lang('messages.rating'):</label>
            <input type="number" name="rating" id="rating" min="0" max="5" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('messages.create_hotel')</button>
    </form>
@endsection
