@extends('layouts.app')

@section('content')
    <h1>Rooms</h1>
    <a href="{{ route('rooms.create') }}">Create New Room</a>
    <ul>
        @foreach($rooms as $room)
            <li>
                <a href="{{ route('rooms.show', $room->id) }}">{{ $room->room_number }}</a>
                <a href="{{ route('rooms.edit', $room->id) }}">Edit</a>
                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection