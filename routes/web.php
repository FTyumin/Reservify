<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/hotels', function () {
    return view('hotels');
});

// Route::get('/listings/{id}',function($id){
//     return response('Listing '.$id,);
// })->where('id','[0-9]+');

