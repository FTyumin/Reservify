@extends('layouts.app')

@section('content')
    <h1>Create Room</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rooms.store', ['hotel' => $hotel->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- // Add a hidden input field to store the hotel ID --}}
        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" required>
        
        <label for="price">Price per night:</label>
        <input type="number" name="price" min="0" max="200" id="price" required>
        
        <label for="capacity">Capacity:</label>
        <input type="number" name="capacity" id="capacity" max="5" required>
        
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required>
        
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        
        <label for="is_available">Available:</label>
        <input type="checkbox" name="is_available" id="is_available" value="1" checked>
        
        <button type="submit">Create</button>
    </form>
@endsection
