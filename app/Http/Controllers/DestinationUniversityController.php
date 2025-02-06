<?php

namespace App\Http\Controllers;
use App\Models\DestinationUniversity;
use App\Models\Destination;
use App\Models\University;
use App\Models\Course;
use Illuminate\Http\Request;

class DestinationUniversityController extends Controller
{
    public function index()
    {
        $destinationUniversities = DestinationUniversity::with('destination')->get();
        return view('admin.destination_university.index', compact('destinationUniversities'));
    }

    // Create - Show the form to create a new destination course
    public function create()
    {
        $destinations = Destination::all();
        $colleges = University::all();
        return view('admin.destination_university.create',compact('destinations','colleges'));
    }

    // Store - Save a new destination course to the database
    public function store(Request $request)
{
    $request->validate([
        'destination_id' => 'required|exists:destinations,id',
        'university_id' => 'required', 
        'university_id.*' => 'exists:universities,id', 
    ]);

   
    $universityIds = json_encode((array) $request->university_id);

 
        DestinationUniversity::create([
            'destination_id' => $request->destination_id,
            'university_id' => $universityIds,
        ]);
    

    return redirect()->route('destination-universities.index')->with('success', 'Destination University created successfully.');
}

    // Edit - Show the form to edit a destination course
    public function edit($id)
    {
        $destinationUniversity = DestinationUniversity::findOrFail($id);
        $selectedUniversityIds = json_decode($destinationUniversity->university_id, true);
        $destinations = Destination::all();
        $colleges= University::all();
        return view('admin.destination_university.edit', compact('destinationUniversity','destinations','colleges','selectedUniversityIds'));
    }

    // Update - Update a destination course in the database
    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'destination_id' => 'required|exists:destinations,id',
        'university_id' => 'required', // Ensure course_id is provided
        'university_id.*' => 'exists:universities,id', // Ensure each value in the array (if it's an array) exists in the courses table
    ]);

    // Convert course_id to an array if it's not already
    $universityIds = (array) $request->university_id;

    // Encode the course IDs as a JSON array
    $universityIdsJson = json_encode($universityIds);

    // Find the destination course by ID
    $destinationUniversity = DestinationUniversity::findOrFail($id);

    // Update the destination course
    $destinationUniversity->update([
        'destination_id' => $request->destination_id,
        'university_id' => $universityIdsJson, // Store course_ids as JSON
    ]);

    return redirect()->route('destination-universities.index')->with('success', 'Destination University updated successfully.');
}

    // Destroy - Delete a destination course
    public function destroy($id)
    {
        $destinationUniversity = DestinationUniversity::findOrFail($id);
        $destinationUniversity->delete();

        return redirect()->route('destination-universities.index')->with('success', 'Destination University deleted successfully.');
    }
}
