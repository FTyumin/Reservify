@extends('layouts.app')

@section('content')
<div class="w-4/5 mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- @dd($guest->name) --}}
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit user {{$guest->name}}</h1>
    <div>
        <x-input-label name="name" :value="__('First Name')" required/>
        <x-text-input id="name" class="block mt-1 w-3xl" type="text" name="name" value="{{$guest->name}}" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-8">
        <x-input-label name="surname" :value="__('Last Name')" required/>
        <x-text-input id="surname" class="block mt-1 w-3xl" type="text" name="surname" value="{{$guest->surname}}" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-8">
        <x-input-label name="phone_number" :value="__('Phone number')" required/>
        <x-text-input id="phone_number" class="block mt-1 w-3xl" type="text" name="phone_number" value="{{$guest->phone_number}}" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-8">
        <x-input-label name="credit_card" :value="__('Credit Card')" required/>
        <x-text-input id="credit_card" class="block mt-1 w-3xl" type="text" name="credit_card" value="{{$guest->credit_card_number}}" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>



    <x-primary-button class="ms-4 mt-8">
        {{ __('Save') }}
    </x-primary-button>
</div>

    {{-- @if(auth()->check() && auth()->user()->hasRole('admin')) --}}

    {{-- @endif --}}

@endsection