{{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <!-- Hero Section -->
    <div class="bg-cover bg-center h-96 text-white py-24 px-10 object-fill" style="background-image: url('/images/hotel-hero.jpg');">
        <div class="md:w-1/2">
            <p class="font-bold text-sm uppercase">Welcome to Our Hotels</p>
            <p class="text-3xl font-bold">Amazing Hotels at Great Prices</p>
            <p class="text-2xl mb-10 leading-none">Select from the best luxury hotels on the planet.</p>
            <a href="{{ route('hotels.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Browse Hotels
            </a>
        </div>
    </div>

    <!-- Search Form -->
    <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-3">Find Your Hotel</h2>
        <form class="flex flex-wrap gap-6">
            <input type="text" placeholder="Destination, hotel name..." class="p-2 border border-gray-300 rounded-lg flex-grow">
            <input type="date" class="p-2 border border-gray-300 rounded-lg">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Search
            </button>
        </form>
    </div>

    <!-- Featured Hotels -->
    <div class="my-10">
        <h2 class="text-2xl font-semibold mb-5">Featured Hotels</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($featuredHotels as $hotel)
            <div class="bg-white shadow-lg rounded-lg p-4">
                <img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->name }}" class="rounded-lg w-full mb-4">
                <div class="text-lg font-bold">{{ $hotel->name }}</div>
                <div class="text-gray-600">{{ $hotel->description }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Testimonials -->
    <div class="bg-gray-100 p-10">
        <h2 class="text-2xl font-semibold mb-5 text-center">What Our Guests Say</h2>
        <div class="flex flex-wrap justify-center gap-4">
            <div class="bg-white shadow-lg rounded-lg p-6 w-96">
                <p class="text-gray-600 italic">"The rooms were beautiful and the staff was fantastic!"</p>
                <div class="text-sm text-gray-600 mt-4">- Guest Name, Country</div>
            </div>
            <!-- Repeat for other testimonials -->
        </div>
    </div>
</div>
@endsection --}}
