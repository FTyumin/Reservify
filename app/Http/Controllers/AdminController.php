<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guest;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        $users = User::whereIn('role',['admin', 'employee'])->get();

        $guests = Guest::all();
        return view('admin.dashboard')->with('users',$users)->with('guests',$guests);
    }
}
