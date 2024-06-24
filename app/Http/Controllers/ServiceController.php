<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Hotel;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Hotel $hotel)
    {
        $services = $hotel->services;
        return view('services.index', compact('services', 'hotel'));
    }

    public function create(Hotel $hotel)
    {
        return view('services.create', compact('hotel'));
    }

    public function store(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        $service = new Service([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        $hotel->services()->save($service); // Save service under the hotel

        return redirect()->route('services.index', ['hotel' => $hotel->id])
            ->with('success', 'Service created successfully.');
    }

    public function show(Hotel $hotel, Service $service)
    {
        // Assuming you want to load the service details and pass it to the view
        $service->load('hotel'); // Ensure hotel relationship is loaded if needed

        return view('services.show', compact('hotel', 'service'));
    }

    public function edit(Hotel $hotel, Service $service)
    {
        return view('services.edit', compact('hotel', 'service'));
    }

    public function update(Request $request, Hotel $hotel, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('services.show', ['hotel' => $hotel->id, 'service' => $service->id])
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Hotel $hotel, Service $service)
    {
        $service->delete();

        return redirect()->route('services.index', ['hotel' => $hotel->id])
            ->with('success', 'Service deleted successfully.');
    }
}
