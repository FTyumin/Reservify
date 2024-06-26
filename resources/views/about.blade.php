@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">{{ __('messages.about_us_title') }}</h1>
    <p class="text-gray-700 leading-relaxed mb-4">
        {{ __('messages.about_us_content_1') }}
    </p>
    <p class="text-gray-700 leading-relaxed mb-4">
        {{ __('messages.about_us_content_2') }}
    </p>
    <p class="text-gray-700 leading-relaxed mb-4">
        {{ __('messages.about_us_content_3') }}
    </p>
    <p class="text-gray-700 leading-relaxed mb-4">
        {{ __('messages.about_us_content_4') }}
    </p>
</div>
@endsection