<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $reviews = $hotel->reviews()->with('user')->get();
        return view('reviews.index', compact('hotel', 'reviews'));
    }

    public function create($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $user = Auth::user();
        return view('reviews.create', compact('hotel', 'user'));
    }

    public function store(Request $request, $hotelId)
    {
        $request->validate([
            'rating' => 'required|integer|min:0|max:5',
            'comment' => 'required|string',
        ]);

        $hotel = Hotel::findOrFail($hotelId);
        $hotel->reviews()->create([
            'user_id' => Auth::id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('reviews.index', $hotelId)->with('success', 'Review created successfully.');
    }

    public function show($id)
    {
        $review = Review::with('user')->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:0|max:5',
            'comment' => 'required|string',
        ]);

        $review = Review::findOrFail($id);
        $review->update($request->only('rating', 'comment'));

        return redirect()->route('reviews.index', $review->hotel_id)->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $hotelId = $review->hotel_id;
        $review->delete();

        return redirect()->route('reviews.index', $hotelId)->with('success', 'Review deleted successfully.');
    }
}
