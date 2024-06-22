@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-2xl font-bold mb-4">Hotels</h1>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <button onclick="window.location.href='{{ route('hotels.create') }}'"
        class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Create New Hotel
    </button>

    <div class="space-y-3">
        @foreach ($hotels as $hotel)
        <div class="flex items-center justify-between bg-white p-4 rounded shadow">
            <a href="{{ route('hotels.show', $hotel) }}" class="text-blue-500 hover:text-blue-700 font-medium">
                {{ $hotel->name }}
            </a>
            <div class="flex space-x-3">
                <a href="{{ route('hotels.edit', $hotel) }}"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                    Edit
                </a>
                <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
