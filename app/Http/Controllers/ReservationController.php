<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Hotel $hotel)
    {
        $reservations = $hotel->reservations()->get();

        return view('reservations.index', compact('reservations'));
    }

    public function create(Hotel $hotel)
    {
        $rooms = $hotel->rooms; // Assuming Hotel has many Rooms
        $services = Service::all();

        return view('reservations.create', compact('hotel', 'rooms', 'services'));
    }

    public function store(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'room_id' => 'required|array',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'is_active' => 'required|boolean',
            'services' => 'nullable|array',
        ]);

        $reservation = Reservation::create([
            'room_id' => $validated['room_id'][0], // Assuming single room selection
            'user_id' => $request->user()->id,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'is_active' => $validated['is_active'],
            'hotel_id' => $hotel->id,
        ]);

        if (isset($validated['services'])) {
            $reservation->services()->sync($validated['services']);
        }

        return redirect()->route('reservations.index', ['hotel' => $hotel->id])->with('success', 'Reservation created successfully!');
    }

    public function show(Hotel $hotel, Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Hotel $hotel, Reservation $reservation)
    {
        $services = Service::all();
        return view('reservations.edit', compact('reservation', 'services'));
    }

    public function update(Request $request, Hotel $hotel, Reservation $reservation)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'is_active' => 'required|boolean',
            'services' => 'nullable|array',
        ]);

        $reservation->update($validated);

        if (isset($validated['services'])) {
            $reservation->services()->sync($validated['services']);
        } else {
            $reservation->services()->detach();
        }

        return redirect()->route('reservations.index', ['hotel' => $hotel->id])->with('success', 'Reservation updated successfully.');
    }

    
    public function destroy(Hotel $hotel, Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index', ['hotel' => $hotel->id])->with('success', 'Reservation deleted successfully.');
    }
}
