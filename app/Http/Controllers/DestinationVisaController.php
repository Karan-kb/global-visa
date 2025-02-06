<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Destination;
use App\Models\DestinationVisaProcess;

use Illuminate\Support\Facades\Storage;




class DestinationVisaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 


    public function index()
    {
        $visas = DestinationVisaProcess::all();
        $destinations = Destination::all();
        return view('admin.destination_visa.index', compact('visas','destinations'));
    }

    // Show - Display a single destination
    // public function show($id)
    // {
    //     $scholarships = DestinationScholarship::findOrFail($id);
        
    //     return view('admin.destination_scholarship.show', compact('destination'));
    // }


    // Store - Save a new destination to the database
    

public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
       
        'sub_title' => 'nullable|string|max:255',
        'destination_id' => 'required',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        'link' => 'nullable|string|max:255',
        
       
    ]);

    // Handle banner image upload
    $bannerImagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $nameToStore = Str::slug($request->title) . '-' . time() . '.' . $extension; // Generate a unique name
        $path = $image->storeAs('public/destination-visa', $nameToStore); // Save the image to storage
        $bannerImagePath = 'destination-visa/' . $nameToStore; // Store the relative path in the database
    }

    

    // Create the destination
    DestinationVisaProcess::create([
        'title' => $request->title,
        
        'sub_title' => $request->sub_title,
        'destination_id' => $request->destination_id,
        'description' => $request->description,
        'image' => $bannerImagePath, // Save the image path
        'link' => $request->link,
       
    ]);

    return redirect()->route('destination-visa.index')->with('success', 'Destination Visa created successfully.');
}

    // Edit - Show the form to edit a destination
    public function edit($id)
    {
        $visa = DestinationVisaProcess::findOrFail($id);
        $destinations = Destination::all();
        
        return view('admin.destination_visa.edit', compact('destinations','visa'));
    }

    // Update - Update a destination in the database
    public function update(Request $request, $id)
{
    // Find the destination by ID
    $visa = DestinationVisaProcess::findOrFail($id);
    //  dd($request->all());
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'sub_title' => 'nullable|string|max:255',
        'destination_id' => 'required',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        'link' => 'nullable',
       
    ]);

    // Handle banner image upload
    $bannerImagePath = $visa->image; // Keep the existing image path by default
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($visa->image && Storage::exists('public/' . $visa->image)) {
            Storage::delete('public/' . $visa->image);
        }

        // Upload the new image
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $nameToStore = Str::slug($request->title) . '-' . time() . '.' . $extension; // Generate a unique name
        $path = $image->storeAs('public/destination-visa', $nameToStore); // Save the image to storage
        $bannerImagePath = 'destination-visa/' . $nameToStore; // Store the relative path in the database
    }

    // Update the destination
    $visa->update([
        'title' => $request->title,
        
        'sub_title' => $request->sub_title,
        'destination_id' => $request->destination_id,
        'description' => $request->description,
        'image' => $bannerImagePath, 
        'link' => $request->link,
       
    ]);

    return redirect()->route('destination-visa.index')->with('success', 'Destination Visa updated successfully.');
}

    // Destroy - Delete a destination
    public function destroy($id)
    {
        $visa = DestinationVisaProcess::findOrFail($id);
        $visa->delete();

      

        return redirect()->route('destination-visa.index')->with('success', 'Destination Visa deleted successfully.');
    }

}
