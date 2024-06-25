<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Service;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function create($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $rooms = Room::where('hotel_id', $hotelId)->where('is_available', true)->get();
        $services = Service::where('hotel_id', $hotelId)->get();
        return view('reservations.create', compact('hotel', 'rooms', 'services'));
    }

    public function store(Request $request, $hotelId)
    {
        $request->validate([
            'room_id' => 'required|array|min:1',
            'room_id.*' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'is_active' => 'required|boolean',
            'services' => 'nullable|array', // Allow services to be null or an array
            'services.*' => 'exists:services,id', // Validate each service ID if present
        ]);

        $guestId = Auth::id();

        $reservationData = $request->all();
        $reservationData['user_id'] = Auth::id();

        $reservation = Reservation::create($reservationData);
        $reservation->services()->sync($request->services);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'is_active' => 'required|boolean',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}