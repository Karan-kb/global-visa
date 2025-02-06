<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Destination;
use App\Models\Highlight;
use App\Models\Country;
use App\Models\City;

use App\Models\ResizeImg;
use App\Models\Questionaire;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    protected $folderPath, $path;

    public function __construct(){
        $this->middleware('auth');

        $this->folderPath = 'public/destination';
        $this->path = public_path('storage/destination');
        if (!file_exists($this->path)) {
            Storage::makeDirectory($this->folderPath);
            chmod($this->path, 0755);
        }
    }

   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 


    public function index()
    {
        $destinations = Destination::all();
        return view('admin.destination.index', compact('destinations'));
    }

    // Show - Display a single destination
    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        
        return view('destinations.show', compact('destination'));
    }

    // Create - Show the form to create a new destination
    public function create()
    {
        $countries = Country::all();
       
        return view('admin.destination.create',compact('countries'));
    }

    // Store - Save a new destination to the database
    

public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:destinations',
        'sub_title' => 'nullable|string|max:255',
        'country' => 'required|string|max:255',
        'description' => 'nullable|string',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        'video_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'why_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'youtube_link' => 'nullable|string|max:255',
        'order' => 'nullable|integer',
        'requirement' => 'nullable|string',
        'scholarship' => 'nullable|string',
        'in_take' => 'nullable|string',
        'is_active' => 'nullable|boolean',
    ]);

    // Handle banner image upload
    $bannerImagePath = null;
    if ($request->hasFile('banner_image')) {
        $image = $request->file('banner_image');
        $extension = $image->getClientOriginalExtension();
        $nameToStore = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension; // Generate a unique name
        $path = $image->storeAs('public/destination', $nameToStore); // Save the image to storage
        $bannerImagePath = 'destination/' . $nameToStore; // Store the relative path in the database
    }
    

    $videoImagePath = null;
    if ($request->hasFile('video_image')) {
        $videoimage = $request->file('video_image');
        $extension = $videoimage->getClientOriginalExtension();
        $nameToStore = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension; // Generate a unique name
        $path = $videoimage->storeAs('public/destination', $nameToStore); // Save the image to storage
        $videoImagePath = 'destination/' . $nameToStore; // Store the relative path in the database
    }
    

    $whyImagePath = null;
    if ($request->hasFile('why_image')) {
        $whyimage = $request->file('why_image');
        $extension = $whyimage->getClientOriginalExtension();
        $nameToStore = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension; // Generate a unique name
        $path = $whyimage->storeAs('public/destination', $nameToStore); // Save the image to storage
        $whyImagePath = 'destination/' . $nameToStore; // Store the relative path in the database
    }

    $seoImagePath = null; // Initialize the variable to store the image path

if ($request->hasFile('seo_image')) {
    $seoImage = $request->file('seo_image'); // Get the uploaded file
    $extension = $seoImage->getClientOriginalExtension(); // Get the file extension
    $seoImageName = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension; // Generate a unique name
    $path = $seoImage->storeAs('public/destination', $seoImageName); // Save the image to storage
    $seoImagePath = 'destination/' . $seoImageName; // Store the relative path in the database

    // Resize the image if needed (optional)
    ResizeImg::resizeImage(1200, 630, $seoImage, $this->folderPath . '/seo_' . $seoImageName);
}
    

    // Get the highest order value from the database and increment it by 1
    $highestOrder = Destination::max('order') ?? 0;
    $newOrder = $highestOrder + 1;
    $bestCities = $request->best_cities ? json_encode(explode(',', $request->best_cities)) : null;
    // Create the destination
    Destination::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'sub_title' => $request->sub_title,
        'why_subtitle' => $request->why_subtitle,
        'fact_subtitle' => $request->fact_subtitle,
        'city_subtitle' => $request->city_subtitle,
        'reason_subtitle' => $request->reason_subtitle,
        'health_subtitle' => $request->health_subtitle,
        'job_subtitle' => $request->job_subtitle,
        'best_cities' => $bestCities,
        "seo_title" => $request->seo_title,
        "seo_keyword" => $request->seo_keyword,
        "seo_description" => $request->seo_description,
        'seo_image'=>$seoImageName,

        'country' => $request->country,
        'description' => $request->description,
        'banner_image' => $bannerImagePath, // Save the image path
        'video_image' => $videoImagePath,
        'why_image' => $whyImagePath,
        'youtube_link' => $request->youtube_link,
        'order' => $newOrder, // Auto-increment the order field
        'requirement' => $request->requirement,
        'scholarship' => $request->scholarship,
        'in_take' => $request->in_take,
        'is_active' => $request->is_active ?? false, // Default to false if not provided
    ]);

    return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
}

    // Edit - Show the form to edit a destination
    public function edit($id)
    {
        $dest = Destination::findOrFail($id);
        $countries = Country::all();
        
        return view('admin.destination.edit', compact('dest','countries'));
    }

    // Update - Update a destination in the database
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:destinations,slug,' . $id, // Ensure slug is unique, except for the current destination
            'sub_title' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'description' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'why_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'requirement' => 'nullable|string',
            'scholarship' => 'nullable|string',
            'in_take' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);
    
        // Find the destination
        $dest = Destination::findOrFail($id);
    
        // Handle banner image upload
        $bannerImagePath = $dest->banner_image;
        if ($request->hasFile('banner_image')) {
            // Delete the old image if exists
            if ($bannerImagePath) {
                Storage::delete('public/' . $bannerImagePath);
            }
    
            $image = $request->file('banner_image');
            $extension = $image->getClientOriginalExtension();
            $nameToStore = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension;
            $path = $image->storeAs('public/destination', $nameToStore);
            $bannerImagePath = 'destination/' . $nameToStore;
        }
    
        // Handle video image upload
        $videoImagePath = $dest->video_image;
        if ($request->hasFile('video_image')) {
            if ($videoImagePath) {
                Storage::delete('public/' . $videoImagePath);
            }
    
            $videoimage = $request->file('video_image');
            $extension = $videoimage->getClientOriginalExtension();
            $nameToStore = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension;
            $path = $videoimage->storeAs('public/destination', $nameToStore);
            $videoImagePath = 'destination/' . $nameToStore;
        }
    
        // Handle why image upload
        $whyImagePath = $dest->why_image;
        if ($request->hasFile('why_image')) {
            if ($whyImagePath) {
                Storage::delete('public/' . $whyImagePath);
            }
    
            $whyimage = $request->file('why_image');
            $extension = $whyimage->getClientOriginalExtension();
            $nameToStore = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension;
            $path = $whyimage->storeAs('public/destination', $nameToStore);
            $whyImagePath = 'destination/' . $nameToStore;
        }// Get the current SEO image path from the model ($dest is your model instance)

$seoImagePath = $dest->seo_image; 

if ($request->hasFile('seo_image')) {
    // Delete the existing SEO image if it exists
    if (!is_null($seoImagePath)) {
        // Ensure you delete the file securely
        Storage::delete('public/' . $seoImagePath); // Deletes the file from storage
    }

    // Process and store the new SEO image
    $seoImage = $request->file('seo_image'); // Uploaded image file
    $extension = $seoImage->getClientOriginalExtension(); // Get the file's extension

    // Generate a unique name for the new image
    $seoImageName = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension;
    
    // Store the image in the `public/destination` directory
    $path = $seoImage->storeAs('public/destination', $seoImageName);

    // Update the new relative path for the database
    $seoImagePath = 'destination/' . $seoImageName;

    // Resize the image for optimization (Optional)
    ResizeImg::resizeImage(1200, 630, $seoImage, $this->folderPath . '/seo_' . $seoImageName);

    
}

        // Best Cities
        $bestCities = $request->best_cities ? json_encode(explode(',', $request->best_cities)) : null;
    
        // Update the destination
        $dest->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'sub_title' => $request->sub_title,
            'why_subtitle' => $request->why_subtitle,
            'fact_subtitle' => $request->fact_subtitle,
            'city_subtitle' => $request->city_subtitle,
            'reason_subtitle' => $request->reason_subtitle,
            'health_subtitle' => $request->health_subtitle,
            'job_subtitle' => $request->job_subtitle,
            'best_cities' => $bestCities,
            'country' => $request->country,
            'description' => $request->description,
            'banner_image' => $bannerImagePath, // Update the banner image path
            'video_image' => $videoImagePath,
            'why_image' => $whyImagePath,
            'youtube_link' => $request->youtube_link,
            'requirement' => $request->requirement,
            'scholarship' => $request->scholarship,
            'seo_title' => $request->seo_title,
            'seo_keyword' => $request->seo_keyword,
            'seo_description' => $request->seo_description,
            'seo_image' => $seoImagePath, 
            'in_take' => $request->in_take,
            'is_active' => $request->is_active,
        ]);
    
        // Redirect with success message
        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully!');
    }
    
    // Destroy - Delete a destination
    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

      

        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    }
}
