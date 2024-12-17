@extends('layouts.app')

@section('content')
<form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PATCH')
    <div class="w-4/5 mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit user {{$user->name}}</h1>
        <div>
            <x-input-label name="name" :value="__('First Name')" required/>
            <x-text-input id="name" class="block mt-1 w-3xl" type="text" name="name" value="{{$user->name}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-8">
            <x-input-label for="email" :value="__('Email')" required/>
            <x-text-input id="email" class="block mt-1 w-3xl" type="text" name="email" value="{{$user->email}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="ms-4 mt-8">
            {{ __('Save') }}
        </x-primary-button>
    </div>
</form>
@endsection