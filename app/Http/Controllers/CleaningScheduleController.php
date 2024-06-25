<?php

namespace App\Http\Controllers;

use App\Models\CleaningSchedule;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class CleaningScheduleController extends Controller
{
    public function index($hotelId, $roomId)
{
    // Retrieve the hotel and room data (assuming you have relations defined)
    $hotel = Hotel::findOrFail($hotelId); 
    $room = Room::findOrFail($roomId);    

    // Retrieve cleaning schedules for the specific room
    $cleaningSchedules = CleaningSchedule::where('room_id', $roomId)->get();

    return view('cleaning_schedules.index', compact('hotel', 'room', 'cleaningSchedules'));
}

    public function create($hotelId, $roomId)
    {
        $hotel = Hotel::findOrFail($hotelId); 
    $room = Room::findOrFail($roomId);    

    return view('cleaning_schedules.create', compact('hotel', 'room'));
    }

    public function store(Request $request, $hotel, $room)
    {
        $request->validate([
            'cleaning_date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
        ]);

        CleaningSchedule::create([
            'room_id' => $room,
            'cleaning_date' => $request->input('cleaning_date'),
            'employee_id' => $request->input('employee_id'),
        ]);

        return redirect()->route('cleaning_schedules.index', ['hotel' => $hotel, 'room' => $room])
            ->with('success', 'Cleaning Schedule created successfully.');
    }

    public function show($hotelId, $roomId, $cleaningScheduleId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $room = Room::findOrFail($roomId);    
        $cleaningSchedule = CleaningSchedule::findOrFail($cleaningScheduleId);

        return view('cleaning_schedules.show', compact('hotel', 'room', 'cleaningSchedule'));
    }

    public function edit($hotelId, $roomId, $cleaningScheduleId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $room = Room::findOrFail($roomId);    
        $cleaningSchedule = CleaningSchedule::findOrFail($cleaningScheduleId);
        return view('cleaning_schedules.edit', compact('hotel', 'room', 'cleaningSchedule'));
    }

    public function update(Request $request, $hotelId, $roomId, $cleaningScheduleId)
{
    $request->validate([
        'cleaning_date' => 'required|date',
        'employee_id' => 'required|exists:employees,id',
    ]);

    $cleaningSchedule = CleaningSchedule::findOrFail($cleaningScheduleId);
    $cleaningSchedule->update([
        'cleaning_date' => $request->cleaning_date,
        'employee_id' => $request->employee_id,
    ]);

    return redirect()->route('cleaning_schedules.show', ['hotel' => $hotelId, 'room' => $roomId, 'cleaningSchedule' => $cleaningScheduleId])
                     ->with('success', 'Cleaning schedule updated successfully.');
}

    public function destroy($id)
    {
        $cleaningSchedule = CleaningSchedule::findOrFail($id);
        $cleaningSchedule->delete();
        return redirect()->route('cleaning_schedules.index')->with('success', 'Cleaning Schedule deleted successfully.');
    }
}
