<?php

namespace App\Http\Controllers;
use App\Models\University;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



use App\Models\Questionaire;
use Illuminate\Support\Facades\Storage;


class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::all();
        return view('admin.university.index', compact('universities'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.university.create',compact('countries'));
    }

    public function store(Request $request)
{
   
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:universities',
        'country' => 'required|string|max:255',
        'city' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'ranking' => 'nullable|integer',
 
        'is_active' => 'nullable|boolean',
    ]);

  
    $bannerImagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $nameToStore = Str::slug($request->name) . '-' . time() . '.' . $extension;
        $path = $image->storeAs('public/universities', $nameToStore); 
        $bannerImagePath = 'universities/' . $nameToStore; 
    }

    
    $highestOrder = University::max('order'); 
    $newOrder = ($highestOrder === null) ? 1 : $highestOrder + 1; 

  
    University::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'country' => $request->country,
        'city' => $request->city,
        'state' => $request->state,
        'description' => $request->description,
        'image' => $bannerImagePath, 
        'ranking' => $request->ranking,
        'order' => $newOrder, 
        'is_active' => $request->is_active ?? false, 
    ]);

    return redirect()->route('universities.index')->with('success', 'University created successfully.');
}

    public function edit($id)
    {
        $university = University::findOrFail($id);
        $countries = Country::all();
        return view('admin.university.edit', compact('university','countries'));
    }

    public function update(Request $request, University $university)
{
   
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:universities,slug,' . $university->id, 
        'country' => 'required|string|max:255',
        'city' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
        'ranking' => 'nullable|integer',
        'is_active' => 'nullable|boolean',
    ]);

   
    $bannerImagePath = $university->image; 
    if ($request->hasFile('image')) {
      
        if ($university->image && Storage::exists('public/' . $university->image)) {
            Storage::delete('public/' . $university->image);
        }

      
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $nameToStore = Str::slug($request->name) . '-' . time() . '.' . $extension; 
        $path = $image->storeAs('public/universities', $nameToStore); 
        $bannerImagePath = 'universities/' . $nameToStore; 
    }

  
    $university->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'country' => $request->country,
        'city' => $request->city,
        'state' => $request->state,
        'description' => $request->description,
        'image' => $bannerImagePath, 
        'ranking' => $request->ranking,
        'is_active' => $request->is_active ?? false, 
    ]);

    return redirect()->route('universities.index')->with('success', 'University updated successfully.');
}

    public function destroy($id)
    {
        $university = University::findOrFail($id);
        $university->delete();

        return redirect()->route('universities.index')->with('success', 'University deleted successfully.');
    }
}
