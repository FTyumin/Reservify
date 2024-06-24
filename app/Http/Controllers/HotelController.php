<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    public function create(Request $request)
    {
        return view('hotels.create');
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'email' => 'required|string|min:10',
            'phone' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
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
            'description' => $request->description,
            'image' => $imagePath,
            'description' => $request->description,
            'rating' => $request->rating,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'email' => 'required|string|min:10',
            'phone' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
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
            'image' => $imagePath,
            'description' => $request->description,
            'rating' => $request->rating,  
        ]);
        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully.');
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->load('rooms');
        return view('hotels.show', compact('hotel'));
    }

    public function edit($id)
    {
        
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'rating' => 'required|numeric|min:0|max:5',
        'description' => 'required|string',
        'image' => 'sometimes|file|image|max:1024', // Adjust according to your needs
    ]);

    if ($request->hasFile('image')) {
        // Delete the old image if exists
        // if ($hotel->image) {
        //     Storage::disk('public')->delete($hotel->image);
        // }
        $imagePath = $request->file('image')->store('images', 'public');
        $hotel->image = $imagePath;
    }

    $hotel->update([
        'name' => $request->name,
        'location' => $request->location,
        'email' => $request->email,
        'phone' => $request->phone,
        'rating' => $request->rating,
        'description' => $request->description,
    ]);

    return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
}


    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}
