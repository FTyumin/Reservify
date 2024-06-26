@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">@lang('messages.services')</h1>
    <a href="{{ route('services.create', ['hotel' => $hotel->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('messages.create_new_service')</a>
    <ul>
        @foreach($services as $service)
            <li class="bg-white shadow-md rounded-lg p-4 mb-4">
                <a href="{{ route('services.show', ['hotel' => $hotel->id, 'service' => $service->id]) }}" class="text-blue-500 hover:text-blue-700 font-bold">{{ $service->name }}</a>
                <a href="{{ route('services.edit', ['hotel' => $hotel->id, 'service' => $service->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">@lang('messages.edit')</a>
                <form action="{{ route('services.destroy', ['hotel' => $hotel->id, 'service' => $service->id]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">@lang('messages.delete')</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection