<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\Destination;
use App\Models\University;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;


use Illuminate\Http\Request;

class ScholarshipController extends Controller
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
        $scholarship=Scholarship::orderBy('created_at','DESC')->get();

        $destinations = Destination::all();

        $courses = Course::all();

        $universities = University::all();
       
        return view('admin.scholarship.index',compact('scholarship','destinations','courses','universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required', // removed the unique validation for now
            'image' => 'image',
            'status' => 'nullable|boolean',
        ]);
    
        $nameToStore = '';
        // Check if a new file is uploaded
        if ($request->hasFile('image')) {
            $image = $request->image;
            $extension = \File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title) . time() . '.' . $extension;
            $path = $image->storeAs('storage/scholarship', $nameToStore);
            $path = $image->move('storage/scholarship', $nameToStore);
        }
    
        // Check if the slug already exists
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
    
        while (Scholarship::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
    
        // Scholarship data to be saved
        $scholarship = [
            'title' => $request->title,
            'slug' => $slug, // Use the generated unique slug\
            'uni_id' => $request->university_id,
            'corse_id' => $request->course_id,
            'desti_id' => $request->destination_id,
            'description' => is_null($request->description) ? NULL : $request->description,
            'short_description' => is_null($request->short_description) ? null : Str::limit($request->short_description, 255),

            'image' => ($nameToStore == '') ? NULL : $nameToStore,
            'status' => $request->status,
        ];
    
        // Create the scholarship
        Scholarship::create($scholarship);
    
        return redirect()->back()->with('success', 'Scholarship Added Successfully!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scholarship=Scholarship::find($id);
        
        
        $destnations = Destination::all();

        $courses = Course::all();

        $univs = University::all();
        
        return view('admin.scholarship.edit',compact('scholarship','destnations','courses','univs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $scholarship=Scholarship::find($id);
        if(file_exists($request->image)){
             //delete old file
             $imagename=$request->image;
             Storage::delete('storage/scholarship'.$imagename);
 
             // save new file
             $file=$request->image;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->title).time().'.'.$extension;
 
             $file->storeAs('storage/scholarship',$nameToStore);
             $file->move('storage/scholarship',$nameToStore);
 
             $scholarship->image=$nameToStore;
     
        }

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        
        // Check if the slug exists for another scholarship (excluding the current one)
        while (Scholarship::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            // If slug exists, append a number to it
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        $scholarship->title=$request->title;
     
        $scholarship->slug = $slug; 

        $scholarship->uni_id=$request->university_id;
        $scholarship->corse_id=$request->course_id;
        $scholarship->desti_id=$request->destination_id;
        $scholarship->description=$request->description;
        $scholarship->short_description = is_null($request->short_description) ? null : Str::limit(strip_tags($request->short_description), 255);

        $scholarship->status=$request->status;

        $scholarship->save();

        return redirect()->route('scholarships.index')->with('success','Scholarship Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scholarship=Scholarship::find($id);
        $scholarship->delete();
        return redirect()->back()->with('success','Scholarship Deleted Succesfully!');
    }
}
