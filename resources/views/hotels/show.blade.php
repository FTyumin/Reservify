@extends('layouts.app')

@section('content')
    <h1>{{ $hotel->name }}</h1>
    <p>Location: {{ $hotel->location }}</p>
    <p>Email: {{ $hotel->email }}</p>
    <p>Phone: {{ $hotel->phone }}</p>
    <p>Rating: {{ $hotel->rating }}</p>
@endsection
