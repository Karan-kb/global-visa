<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Destination;
use App\Models\DestinationScholarship;

use Illuminate\Support\Facades\Storage;

class DestinationScholarshipController extends Controller
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
        $scholarships = DestinationScholarship::all();
        $destinations = Destination::all();
        return view('admin.destination_scholarship.index', compact('scholarships','destinations'));
    }

    // Show - Display a single destination
    // public function show($id)
    // {
    //     $scholarships = DestinationScholarship::findOrFail($id);
        
    //     return view('admin.destination_scholarship.show', compact('destination'));
    // }

    // Create - Show the form to create a new destination
    public function create()
    {
        $destinations = Destination::all();
       
        return view('admin.destination_scholarship.create',compact('destinations'));
    }

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
        $path = $image->storeAs('public/destination-scholarship', $nameToStore); // Save the image to storage
        $bannerImagePath = 'destination-scholarship/' . $nameToStore; // Store the relative path in the database
    }

    

    // Create the destination
    DestinationScholarship::create([
        'title' => $request->title,
        
        'sub_title' => $request->sub_title,
        'destination_id' => $request->destination_id,
        'description' => $request->description,
        'image' => $bannerImagePath, // Save the image path
        'link' => $request->link,
       
    ]);

    return redirect()->route('destination-scholarship.index')->with('success', 'Destination Scholarship created successfully.');
}

    // Edit - Show the form to edit a destination
    public function edit($id)
    {
        $scholarship = DestinationScholarship::findOrFail($id);
        $destinations = Destination::all();
        
        return view('admin.destination_scholarship.edit', compact('destinations','scholarship'));
    }

    // Update - Update a destination in the database
    public function update(Request $request, $id)
{
    // Find the destination by ID
    $scholarship = DestinationScholarship::findOrFail($id);
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
    $bannerImagePath = $scholarship->image; // Keep the existing image path by default
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($scholarship->image && Storage::exists('public/' . $scholarship->image)) {
            Storage::delete('public/' . $scholarship->image);
        }

        // Upload the new image
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $nameToStore = Str::slug($request->title) . '-' . time() . '.' . $extension; // Generate a unique name
        $path = $image->storeAs('public/destination-scholarship', $nameToStore); // Save the image to storage
        $bannerImagePath = 'destination-scholarship/' . $nameToStore; // Store the relative path in the database
    }

    // Update the destination
    $scholarship->update([
        'title' => $request->title,
        
        'sub_title' => $request->sub_title,
        'destination_id' => $request->destination_id,
        'description' => $request->description,
        'image' => $bannerImagePath, 
        'link' => $request->link,
       
    ]);

    return redirect()->route('destination-scholarship.index')->with('success', 'Destination updated successfully.');
}

    // Destroy - Delete a destination
    public function destroy($id)
    {
        $scholarship = DestinationScholarship::findOrFail($id);
        $scholarship->delete();

      

        return redirect()->route('destination-scholarship.index')->with('success', 'Destination deleted successfully.');
    }

}
