{{ route('guests.update', $guest) }}
@extends('layouts.app')

@section('content')
<form action="{{ route('guests.update', $guest) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PATCH')
    <div class="w-4/5 mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit guest {{$guest->name}}</h1>
        <div>
            <x-input-label name="name" :value="__('First Name')" required/>
            <x-text-input id="name" class="block mt-1 w-3xl" type="text" name="name" value="{{$guest->name}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-8">
            <x-input-label for="surname" :value="__('Surname')" required/>
            <x-text-input id="surname" class="block mt-1 w-3xl" type="text" name="surname" value="{{$guest->surname}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <div class="mt-8">
            <x-input-label for="email" :value="__('Email')" required/>
            <x-text-input id="email" class="block mt-1 w-3xl" type="text" name="email" value="{{$guest->email}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-8">
            <x-input-label for="phone_number" :value="__('Phone number')" required/>
            <x-text-input id="phone_number" class="block mt-1 w-3xl" type="text" name="phone_number" value="{{$guest->phone_number}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <div class="mt-8">
            <x-input-label for="credit_card" :value="__('Credit Card')" required/>
            <x-text-input id="credit_card" class="block mt-1 w-3xl" type="text" name="credit_card" value="{{$guest->credit_card_number}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('credit_card')" class="mt-2" />
        </div>



        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>