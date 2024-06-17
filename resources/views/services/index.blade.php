@extends('layouts.app')

@section('content')
    <h1>Services</h1>
    <a href="{{ route('services.create') }}">Create New Service</a>
    <ul>
        @foreach($services as $service)
            <li>
                <a href="{{ route('services.show', $service->id) }}">{{ $service->name }}</a>
                <a href="{{ route('services.edit', $service->id) }}">Edit</a>
                <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection