<?php

namespace App\Http\Controllers;

use App\Models\CleaningSchedule;
use Illuminate\Http\Request;

class CleaningScheduleController extends Controller
{
    public function index()
    {
        $cleaningSchedules = CleaningSchedule::all();
        return view('cleaning_schedules.index', compact('cleaningSchedules'));
    }

    public function create()
    {
        return view('cleaning_schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'cleaning_date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
        ]);

        CleaningSchedule::create($request->all());
        return redirect()->route('cleaning_schedules.index')->with('success', 'Cleaning Schedule created successfully.');
    }

    public function show($id)
    {
        $cleaningSchedule = CleaningSchedule::findOrFail($id);
        return view('cleaning_schedules.show', compact('cleaningSchedule'));
    }

    public function edit($id)
    {
        $cleaningSchedule = CleaningSchedule::findOrFail($id);
        return view('cleaning_schedules.edit', compact('cleaningSchedule'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'cleaning_date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
        ]);

        $cleaningSchedule = CleaningSchedule::findOrFail($id);
        $cleaningSchedule->update($request->all());
        return redirect()->route('cleaning_schedules.index')->with('success', 'Cleaning Schedule updated successfully.');
    }

    public function destroy($id)
    {
        $cleaningSchedule = CleaningSchedule::findOrFail($id);
        $cleaningSchedule->delete();
        return redirect()->route('cleaning_schedules.index')->with('success', 'Cleaning Schedule deleted successfully.');
    }
}
