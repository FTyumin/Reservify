<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        // Return the admin dashboard view 
        $users = User::all();
        return view('admin.dashboard')->with('users',$users);
    }
}
