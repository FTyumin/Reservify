<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->get();

        return view('myprofile.show', compact('user', 'reservations'));
    }
}
