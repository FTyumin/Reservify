<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

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
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email',
            'phone_number' => 'required|string|max:20',
            'credit_card_number' => 'required|string|max:20',
        ]);

        Guest::create($request->all());
        return redirect()->route('guests.index')->with('success', 'Guest created successfully.');
    }

    public function show($id)
    {
        $guest = Guest::findOrFail($id);
        return view('guests.show', compact('guest'));
    }

    public function edit($id)
    {
        $guest = Guest::findOrFail($id);
        return view('guests.edit', compact('guest'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email,' . $id,
            'phone_number' => 'required|string|max:20',
            'credit_card_number' => 'required|string|max:20',
        ]);

        $guest = Guest::findOrFail($id);
        $guest->update($request->all());
        return redirect()->route('guests.index')->with('success', 'Guest updated successfully.');
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return redirect()->route('guests.index')->with('success', 'Guest deleted successfully.');
    }
}
