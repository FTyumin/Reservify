<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $locale = $request->input('language');
        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back()->with('success', __('messages.language_changed'));
    }
}
