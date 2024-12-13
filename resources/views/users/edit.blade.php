@extends('layouts.app')

@section('content')
<div class="w-4/5 mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit user {{$user->name}}</h1>
    {{-- @dd($user) --}}
    <div>
        <x-input-label name="password" required/>
        <x-text-input id="name" class="block mt-1 w-3xl" type="text" name="name" :value="{{$user}}" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>


    {{-- @if(auth()->check() && auth()->user()->hasRole('admin')) --}}

    {{-- @endif --}}

@endsection