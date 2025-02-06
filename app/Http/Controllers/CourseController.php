<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.course.create');
    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:courses',
            'credit_hour' => 'nullable|numeric',
            'description' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
            'is_active' => 'required|boolean', // Validate the is_active field
        ]);
    
        // Handle banner image upload
        $bannerImagePath = null;
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $extension = $image->getClientOriginalExtension();
            $nameToStore = Str::slug($request->name) . '-' . time() . '.' . $extension; // Generate a unique name
            $path = $image->storeAs('public/courses', $nameToStore); // Save the image to storage
            $bannerImagePath = 'courses/' . $nameToStore; // Store the relative path in the database
        }
    
        // Get the highest order value from the database
        $highestOrder = Course::max('order');
    
        // If no records exist, set the order to 1; otherwise, increment the highest order by 1
        $newOrder = ($highestOrder === null) ? 1 : $highestOrder + 1;
    
        // Create the course
        Course::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'credit_hour' => $request->credit_hour,
            'description' => $request->description,
            'banner_image' => $bannerImagePath, // Save the image path
            'order' => $newOrder, // Set the order field
            'is_active' => $request->is_active, // Save the is_active field
        ]);
    
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.course.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:courses,slug,' . $course->id, // Ensure slug is unique except for the current course
        'credit_hour' => 'nullable|numeric',
        'description' => 'nullable|string',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        'is_active' => 'required|boolean', // Validate the is_active field
    ]);

    // Handle banner image upload
    $bannerImagePath = $course->banner_image; // Keep the existing image by default
    if ($request->hasFile('banner_image')) {
        // Delete the old image if it exists
        if ($course->banner_image && Storage::exists('public/' . $course->banner_image)) {
            Storage::delete('public/' . $course->banner_image);
        }

        // Upload the new image
        $image = $request->file('banner_image');
        $extension = $image->getClientOriginalExtension();
        $nameToStore = Str::slug($request->name) . '-' . time() . '.' . $extension; // Generate a unique name
        $path = $image->storeAs('public/courses', $nameToStore); // Save the image to storage
        $bannerImagePath = 'courses/' . $nameToStore; // Store the relative path in the database
    }

    // Update the course
    $course->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'credit_hour' => $request->credit_hour,
        'description' => $request->description,
        'banner_image' => $bannerImagePath, // Save the image path
        'is_active' => $request->is_active, // Save the is_active field
    ]);

    return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
}

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
