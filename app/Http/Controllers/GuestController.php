<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|unique:guests,email',
            'phone_number' => 'required|string|max:20',
            'credit_card_number' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed', // Add a password field
        ]);

        // Create the User first
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Create the Guest with the created user's ID
        Guest::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'credit_card_number' => $request->credit_card_number,
            'expiry_date'=>$request->expiry_date,
            'cvv'=>$request->cvv
        ]);

        return redirect()->route('guests.index')->with('success', 'Guest created successfully.');
    }

    public function show($id)
    {
        $guest = Guest::findOrFail($id);
        return view('guests.show', compact('guest'));
    }

    public function edit($id)
    {
        $data = Guest::findorFail($id);
        return view('guests.edit',['guest' => $data]);
    }

    public function update(Request $request, $id)
    {
        // dd('Form Submitted!', $request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:100',
            'phone_number' => 'required|string|max:20',
            'credit_card' => 'required|string|max:20',
        ]);
    
        // // Find the guest
        $guest = Guest::findOrFail($id);
    
        // // Update the guest details
        $guest->update($validated);

        // Update the corresponding User's details
        // $guest->user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        // ]);

        // Update User password if provided
        // if ($request->filled('password')) {
        //     $guest->user->update([
        //         'password' => Hash::make($request->password),
        //     ]);
        // }

        return redirect()->route('admin.dashboard')->with('success', 'Guest updated successfully.');
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);

        // Delete the related User
        if ($guest->user) {
            $guest->user->delete();
        }

        // Delete the Guest
        $guest->delete();

        return redirect()->route('guests.index')->with('success', 'Guest deleted successfully.');
    }
}
