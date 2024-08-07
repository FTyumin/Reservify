<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function myprofile()
    {
        return view('myprofile');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}