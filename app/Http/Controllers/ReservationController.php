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

    public function create(Hotel $hotel, Room $room)
    {
        $services = Service::where('hotel_id', $hotel->id)->get();

        return view('reservations.create', compact('hotel', 'room', 'services'));
    }

    public function store(Request $request, Hotel $hotel, Room $room)
    {
        $validated = $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'services' => 'nullable|array',
        ]);

        $reservation = Reservation::create([
            'room_id' => $room->id,
            'user_id' => $request->user()->id,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'hotel_id' => $hotel->id,
        ]);

        if (isset($validated['services'])) {
            $reservation->services()->sync($validated['services']);
        }

        return redirect()->route('reservations.show', ['hotel' => $hotel->id, 'reservation'=>$reservation->id])->with('success', 'Reservation created successfully!');
    }

    public function show(Hotel $hotel, Reservation $reservation)
    {
        $reservation->load('guest.user');
        return view('reservations.show', compact('hotel','reservation'));
    }

    public function edit(Hotel $hotel, Reservation $reservation)
    {
        // $reservation->check_in = $reservation->check_in->format('Y-m-d');
        // $reservation->check_out = $reservation->check_out->format('Y-m-d');
        
        $services = Service::all();
        return view('reservations.edit', compact('hotel', 'reservation', 'services'));
    }

    public function update(Request $request, Hotel $hotel, Reservation $reservation)
    {
        $validated = $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
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
