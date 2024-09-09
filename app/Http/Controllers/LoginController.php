<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    

    public function redirectTo()
    {
        // Example: Redirect admin users to admin dashboard
        if (Auth::user()->hasRole('admin')) {
            return '/admin/dashboard';
        }

        // Example: Redirect regular users to user dashboard
        return '/'; 
    }

    
}
