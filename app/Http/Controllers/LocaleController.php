<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LocaleController extends Controller
{
    public function setLocale(Request $request, $lang)
    {
        Log::info('Attempting to set locale to: ' . $lang);
        if (in_array($lang, ['en', 'lv', 'ru'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);

            Log::info('Locale set to: ' . $lang);
            
            return redirect()->back()->with('success', __('messages.language_changed'));
        }

        return redirect()->back()->withErrors(__('messages.invalid_language'));
    }
}