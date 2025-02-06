<?php

namespace App\Http\Controllers;
use App\Models\DestinationCourse;
use App\Models\Destination;
use App\Models\Course;
use Illuminate\Http\Request;

class DestinationCourseController extends Controller
{
    public function index()
    {
        $destinationCourses = DestinationCourse::with('destination')->get();
        return view('admin.destination_course.index', compact('destinationCourses'));
    }

    // Create - Show the form to create a new destination course
    public function create()
    {
        $destinations = Destination::all();
        $courses = Course::all();
        return view('admin.destination_course.create',compact('destinations','courses'));
    }

    // Store - Save a new destination course to the database
    public function store(Request $request)
{
    $request->validate([
        'destination_id' => 'required|exists:destinations,id',
        'course_id' => 'required', 
        'course_id.*' => 'exists:courses,id', 
    ]);

   
    $courseIds = json_encode((array) $request->course_id);

 
        DestinationCourse::create([
            'destination_id' => $request->destination_id,
            'course_id' => $courseIds,
        ]);
    

    return redirect()->route('destination-courses.index')->with('success', 'Destination Course created successfully.');
}

    // Edit - Show the form to edit a destination course
    public function edit($id)
    {
        $destinationCourse = DestinationCourse::findOrFail($id);
        $selectedCourseIds = json_decode($destinationCourse->course_id, true);
        $destinations = Destination::all();
        $courses = Course::all();
        return view('admin.destination_course.edit', compact('destinationCourse','destinations','courses','selectedCourseIds'));
    }

    // Update - Update a destination course in the database
    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'destination_id' => 'required|exists:destinations,id',
        'course_id' => 'required', // Ensure course_id is provided
        'course_id.*' => 'exists:courses,id', // Ensure each value in the array (if it's an array) exists in the courses table
    ]);

    // Convert course_id to an array if it's not already
    $courseIds = (array) $request->course_id;

    // Encode the course IDs as a JSON array
    $courseIdsJson = json_encode($courseIds);

    // Find the destination course by ID
    $destinationCourse = DestinationCourse::findOrFail($id);

    // Update the destination course
    $destinationCourse->update([
        'destination_id' => $request->destination_id,
        'course_id' => $courseIdsJson, // Store course_ids as JSON
    ]);

    return redirect()->route('destination-courses.index')->with('success', 'Destination Course updated successfully.');
}

    // Destroy - Delete a destination course
    public function destroy($id)
    {
        $destinationCourse = DestinationCourse::findOrFail($id);
        $destinationCourse->delete();

        return redirect()->route('destination-courses.index')->with('success', 'Destination Course deleted successfully.');
    }
}
