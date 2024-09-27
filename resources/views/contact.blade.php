@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">@lang('messages.contact_us_title')</h1>
    <p class="text-gray-700 leading-relaxed mb-4">
        @lang('messages.contact_us_content_1')
    </p>
    <p class="text-gray-700 leading-relaxed mb-4">
        @lang('messages.contact_us_content_2')
    </p>
    <p class="text-gray-700 leading-relaxed mt-4">
        @lang('messages.contact_us_content_3') <a href="mailto:support@reservify.com" class="text-blue-500 hover:underline">support@reservify.com</a><br>
        @lang('messages.contact_us_content_4') <a href="tel:+1234567890" class="text-blue-500 hover:underline">(123) 456-7890</a><br>
        @lang('messages.contact_us_exec_manager') <a href="mailto:execman@reservify.com" class="text-blue-500 hover:underline">Iļja Sančenko</a><br>
        @lang('messages.contact_us_software_manager') <a href="mailto:softman@reservify.com" class="text-blue-500 hover:underline">Feodors Tjumins</a>
    </p>
    <p class="text-gray-700 leading-relaxed mt-4">
        @lang('messages.contact_us_more_inquiries')
    </p>
    <p class="text-gray-700 leading-relaxed mt-4">
        @lang('messages.contact_us_grand_royale_hotel')<br>
        @lang('messages.contact_us_grand_royale_address')<br>
        @lang('messages.email'): <a href="mailto:@lang('messages.contact_us_grand_royale_email') }}" class="text-blue-500 hover:underline">@lang('messages.contact_us_grand_royale_email')</a><br>
        @lang('messages.phone'): <a href="tel:@lang('messages.contact_us_grand_royale_phone') }}" class="text-blue-500 hover:underline">@lang('messages.contact_us_grand_royale_phone')</a>
    </p>
    <p class="text-gray-700 leading-relaxed mt-4">
        @lang('messages.contact_us_oceanview_retreat')<br>
        @lang('messages.contact_us_oceanview_address')<br>
        @lang('messages.email'): <a href="mailto:@lang('messages.contact_us_oceanview_email') }}" class="text-blue-500 hover:underline">@lang('messages.contact_us_oceanview_email')</a><br>
        @lang('messages.phone'): <a href="tel:@lang('messages.contact_us_oceanview_phone') }}" class="text-blue-500 hover:underline">@lang('messages.contact_us_oceanview_phone')</a>
    </p>
    <p class="text-gray-700 leading-relaxed mt-4">
        @lang('messages.contact_us_thank_you')
    </p>
</div>
@endsection