@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-6">@lang('create_schedule')</h1>

        <form action="{{ route('cleaning_schedules.store', ['hotel' => $hotel->id, 'room' => $room->id]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="cleaning_date" class="block text-gray-700 font-bold mb-2">@lang('cleaning_date'):</label>
                <input type="datetime-local" id="cleaning_date" name="cleaning_date" class="form-input rounded-md shadow-sm">
                @error('cleaning_date')
                    <p class="text-red-500 text-xs mt-1">@lang('cleaning_date_error', ['message' => $message])</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="employee_id" class="block text-gray-700 font-bold mb-2">@lang('employee_id'):</label>
                <input type="text" id="employee_id" name="employee_id" class="form-input rounded-md shadow-sm">
                @error('employee_id')
                    <p class="text-red-500 text-xs mt-1">@lang('employee_id_error', ['message' => $message])</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('submit')</button>
        </form>
    </div>
@endsection