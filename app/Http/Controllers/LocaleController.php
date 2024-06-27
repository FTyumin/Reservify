<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class LocaleController extends Controller
{
    public function switch(Request $request)
    {
        $locale = $request->input('locale');
        if (in_array($locale, ['en', 'lv', 'ru'])) {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }
}
