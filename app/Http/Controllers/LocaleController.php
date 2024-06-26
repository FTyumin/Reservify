<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;

use Illuminate\Http\Request;

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