<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create(Hotel $hotel)
    {
        return view('rooms.create', compact('hotel'));
    }

    public function store(Request $request, Hotel $hotel)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'type' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'is_available' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Room::create([
            'hotel_id' => $hotel->id,
            'type' => $request->type,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'image' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        // $hotel->rooms()->create($request->all());

        // Room::create($request->all());
        // return redirect()->route('rooms.index')->with('success', 'Room created successfully.');


        Log::info('Room created', ['room' => $request->type]);

        return redirect()->route('hotels.show', $hotel->id);
    }

    public function show(Hotel $hotel, Room $room)
    {
        // $room = Room::findOrFail();
        return view('rooms.show', compact('hotel','room'));
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'type' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'is_available' => 'required|boolean',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Hotel $hotel, Room $room)
    {
        $room->delete();
        return redirect()->route('hotels.show', $hotel->id)->with('success', 'Room deleted successfully.');
    }
}
