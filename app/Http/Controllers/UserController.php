<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function create(){
        return view('auth.register');
    }

    // displaying users for admin
    // public function index() {
    //     $users = User::all();
    //     return view('admin.dashboard', ['user' => 'Fedja']);
    // }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

}
