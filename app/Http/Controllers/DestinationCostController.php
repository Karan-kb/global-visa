<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Destination;
use App\Models\DestinationCost;

use Illuminate\Http\Request;

class DestinationCostController extends Controller
{
    public function index()
    {
        $costs = DestinationCost::all();
        return view('admin.destination_cost.index', compact('costs'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('admin.destination_cost.create',compact('destinations'));
    }

    public function store(Request $request)
{
    $request->validate([
        'destination_id' => 'required|exists:destinations,id',
        'title' => 'required|string',
        'value' => 'required|string',
        'type' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $bannerImagePath = null; // Initialize default image path as null

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $nameToStore = Str::slug($request->title) . '-' . time() . '.' . $extension;
        $path = $image->storeAs('public/destination-cost', $nameToStore);
        $bannerImagePath = 'destination-cost/' . $nameToStore;
    }

    DestinationCost::create([
        'destination_id' => $request->destination_id,
        'title' => $request->title,
        'value' => $request->value,
        'type' => $request->type,
        'image' => $bannerImagePath, // Save image path to DB
    ]);

    return redirect()->route('destination-costs.index')->with('success', 'Cost created successfully.');
}


    public function edit($id)
    {
        $cost = DestinationCost::findOrFail($id);
        $destinations = Destination::all();
        return view('admin.destination_cost.edit', compact('cost','destinations'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'destination_id' => 'required|exists:destinations,id',
        'title' => 'required|string',
        'value' => 'required|string',
        'type' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image
    ]);

    $cost = DestinationCost::findOrFail($id); // Retrieve the existing record

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($cost->image && Storage::exists('public/' . $cost->image)) {
            Storage::delete('public/' . $cost->image);
        }

        // Upload the new image
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $nameToStore = Str::slug($request->title) . '-' . time() . '.' . $extension; 
        $image->storeAs('public/destination-cost', $nameToStore); // Save to storage

        $cost->image = 'destination-cost/' . $nameToStore; // Update image path
    }

    // Update other fields
    $cost->update([
        'destination_id' => $request->destination_id,
        'title' => $request->title,
        'value' => $request->value,
        'type' => $request->type,
        'image' => $cost->image, // Keep new/old image path
    ]);

    return redirect()->route('destination-costs.index')->with('success', 'Cost updated successfully.');
}


    public function destroy($id)
    {
        $cost = DestinationCost::findOrFail($id);
        $cost->delete();

        return redirect()->route('destination-costs.index')->with('success', 'Cost deleted successfully.');
    }
}
