<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'rating' => 'required|numeric|min:0|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Hotel::create([
            'name' => $request->name,
            'location' => $request->location,
            'email' => $request->email,
            'phone' => $request->phone,
            'rating' => $request->rating,
            'image' => $imagePath,
        ]);
        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully.');
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->load('rooms', 'services');
        return view('hotels.show', compact('hotel'));
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}
