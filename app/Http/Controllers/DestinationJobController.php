<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use App\Models\Destination;
use App\Models\DestinationJob;

class DestinationJobController extends Controller
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
        $jobs = DestinationJob::orderBy('created_at','DESC')->get();
        $destinations = Destination::all();

        return view('admin.destination_job.index',compact('jobs','destinations'));
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
            'image' => 'image',
        ]);
    
        $nameToStore = '';
        // Check if a new file is uploaded
        if ($request->hasFile('image')) {
            $image = $request->image;
            $extension = \File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title) . time() . '.' . $extension;
    
            // Move the file to the desired location
            $image->move(public_path('storage/job'), $nameToStore);
        }
    
        // Save data in the database
        $reason = new DestinationJob;
        $reason->destination_id = $request->destination_id;
        $reason->title = $request->title;
        $reason->description = $request->description ?? null;
    
        // Save the image path or name to the database
        if ($nameToStore) {
            $reason->image = 'storage/job/' . $nameToStore; // Adjust the column name as per your database
        }
    
        $reason->save();
    
        return redirect()->back()->with('success', 'Job Added Successfully!');
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
    // dd($id);
    $job= DestinationJob::find($id);

    $destinations = Destination::all();
    // dd($service);
    if (!$job) {
        return redirect()->back()->with('error', 'Job not found!');
    }

    return view('admin.destination_job.edit',compact('job','destinations'));
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
        $job = DestinationJob::find($id);
    
        // Check if a new file is uploaded
        if ($request->hasFile('image')) {
            // Delete the old file if it exists
            if ($reason->image && file_exists(public_path($reason->image))) {
                unlink(public_path($reason->image));
            }
    
            // Save the new file
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $nameToStore = Str::slug($request->title) . time() . '.' . $extension;
    
            $file->move(public_path('storage/job'), $nameToStore);
    
            // Update the image field in the database
            $reason->image = 'storage/job/' . $nameToStore;
        }
    
        // Update other fields
        $job->title = $request->title;
        $job->destination_id = $request->destination_id;
        $job->description = $request->description;
    
        // Save changes
        $job->save();
    
        return redirect()->route('destination-job.index')->with('success', 'Job Edited Successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job=DestinationJob::find($id);
      
        $job->delete();
        return redirect()->back()->with('success','Job Deleted Successfylly!!');
    }

}
