@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-6">@lang('schedules_for_room', ['roomType' => $room->type, 'hotelName' => $hotel->name])</h1>

        @if ($cleaningSchedules->isEmpty())
            <p>@lang('no_schedules_found')</p>
        @else
            <ul>
                @foreach ($cleaningSchedules as $schedule)
                    <li>
                        <a href="{{ route('cleaning_schedules.show', ['hotel' => $hotel->id, 'room' => $room->id, 'cleaningSchedule' => $schedule->id]) }}">
                            {{ $schedule->cleaning_date }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="flex space-x-4">
        <a href="{{ route('cleaning_schedules.create', ['hotel' => $hotel->id, 'room' => $room->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            @lang('add_new_schedule')
        </a>
        <a href="{{ route('rooms.show', ['hotel' => $hotel->id, 'room' => $room->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            @lang('return_to_room_details')
        </a>
    </div>
@endsection