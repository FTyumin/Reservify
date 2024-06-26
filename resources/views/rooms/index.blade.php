@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-2xl font-bold mb-4">{{ __('messages.rooms') }}</h1>
    
    <a href="{{ route('rooms.create') }}" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        {{ __('messages.create_new_room') }}
    </a>

    <div class="mt-6">
        <ul class="space-y-3">
            @foreach ($rooms as $room)
            <li class="bg-white shadow overflow-hidden rounded-md px-6 py-4 flex items-center justify-between">
                <a href="{{ route('rooms.show', $room->id) }}" class="text-blue-500 hover:text-blue-700">
                    {{ __('messages.room') }} {{ $room->room_number }}
                </a>

                @if(auth()->check())
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('employee'))
                        <div class="flex items-center">
                            <a href="{{ route('rooms.edit', $room->id) }}" class="text-sm bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded mr-2">
                                {{ __('messages.edit') }}
                            </a>
                            @if(auth()->user()->hasRole('admin'))
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                                        {{ __('messages.delete') }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endif
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
