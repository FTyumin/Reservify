<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['permission:product-list|product-create|product-edit|product-delete'], ['only' => ['index', 'show']]);
    //     $this->middleware(['permission:hotel-create'], ['only' => ['create', 'store']]);
    //     $this->middleware(['permission:hotel-edit'], ['only' => ['edit', 'update']]);
    //     $this->middleware(['permission:hotel-delete'], ['only' => ['destroy']]);
    // }

    public function index()
    {
        $hotels = Hotel::with('reviews')->get();

        foreach ($hotels as $hotel) {
            $hotel->averageRating = $hotel->reviews->avg('rating') ?: $hotel->rating;
        }

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
            'email' => 'required|string|min:10',
            'phone' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        Hotel::create([
            'name' => $request->name,
            'location' => $request->location,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'image' => $imagePath,
            'rating' => $request->rating,
        ]);

        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully.');
    }

    public function show(Hotel $hotel)
    {
        $reviews = $hotel->reviews;
        $averageRating = $reviews->avg('rating');
        return view('hotels.show', compact('hotel', 'averageRating'));
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
            if ($hotel->image) {
                Storage::disk('public')->delete($hotel->image);
            }
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
