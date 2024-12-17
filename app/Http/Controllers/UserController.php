<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function create(){
        return view('auth.register');
    }


    public function edit($id) {
        $data = User::findOrFail($id);
        return view('users.edit',['user'=>$data]);
    }

    public function update(Request $request, User $user) {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        return redirect()->route('admin.dashboard')->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }

}
