@extends('layouts.app')

@section('content')
<div class="w-4/5 mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">@lang('messages.hotels')</h1>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(auth()->check() && auth()->user()->hasRole('admin'))
    <button onclick="window.location.href='{{ route('hotels.create') }}'"
        class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        @lang('messages.create_hotel')
        
    </button>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($hotels as $hotel)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="{{ asset('storage/' . $hotel->image) }}" alt="Hotel Image" class="w-full h-48 object-cover">
            <div class="p-4">
                <p class="text-lg font-semibold text-gray-800">{{ $hotel->name }}</p>
                <p class="text-sm text-gray-600">{{ $hotel->location }}</p>

                <div class="flex items-center justify-between mt-3">
                    <a href="{{ route('hotels.show', $hotel) }}" class="text-blue-500 hover:text-blue-700 font-medium">
                        @lang('messages.show_prices')
                        
                    </a>
                    <div class="flex items-center text-sm text-gray-600">
                        <span class="inline-block bg-yellow-300 text-yellow-800 text-s px-2 rounded-full uppercase font-semibold tracking-wide">
                            {{ number_format($hotel->averageRating, 1) }}
                        </span>
                        <span class="ml-2"> {{__('messages.rating')}}</span>
                    </div>
                </div>
                @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('employee')))
                <div class="mt-4 flex space-x-3">
                    <a href="{{ route('hotels.edit', $hotel) }}"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs">
                        @lang('messages.edit')
                        
                    </a>
                    
                    @if(auth()->user()->hasRole('admin'))
                    <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs">
                            @lang('messages.delete')
                        
                        </button>
                        
                    </form>
                    @endif
                </div>
                @endif
            
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection