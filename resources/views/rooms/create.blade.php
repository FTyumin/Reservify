@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create Room</h1>

    @if ($errors->any())
        <div class="alert alert-danger bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rooms.store', ['hotel' => $hotel->id]) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

        <div class="mb-4">
            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
            <input type="text" name="type" id="type" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price per night:</label>
            <input type="number" name="price" min="0" max="200" id="price" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacity:</label>
            <input type="number" name="capacity" id="capacity" max="5" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <input type="text" name="description" id="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="is_available" class="block text-gray-700 text-sm font-bold mb-2">Available:</label>
            <input type="checkbox" name="is_available" id="is_available" value="1" checked class="mr-2 leading-tight">
            <span class="text-sm">Yes</span>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
        </div>
    </form>
@endsection
