<?php

namespace App\Http\Controllers;
use App\Models\Achievement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AchievementController extends Controller
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
        $achievements=Achievement::orderBy('created_at','DESC')->get();

        return view('admin.achievement.index',compact('achievements'));
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
            $image->move(public_path('storage/achievement'), $nameToStore);
        }
    
        // Save data in the database
        $achievement = new Achievement;
        $achievement->title = $request->title;
        $achievement->count = $request->count ?? null;
    
        // Save the image path or name to the database
        if ($nameToStore) {
            $achievement->image = 'storage/achievement/' . $nameToStore; // Adjust the column name as per your database
        }
    
        $achievement->save();
    
        return redirect()->back()->with('success', 'Achievement Added Successfully!');
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
    $achievement = Achievement::find($id);
    // dd($service);
    if (!$achievement) {
        return redirect()->back()->with('error', 'Achievement not found!');
    }

    return view('admin.achievement.edit',compact('achievement'));
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
        $achievement = Achievement::find($id);
    
        // Check if a new file is uploaded
        if ($request->hasFile('image')) {
            // Delete the old file if it exists
            if ($achievement->image && file_exists(public_path($achievement->image))) {
                unlink(public_path($achievement->image));
            }
    
            // Save the new file
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $nameToStore = Str::slug($request->title) . time() . '.' . $extension;
    
            $file->move(public_path('storage/achievement'), $nameToStore);
    
            // Update the image field in the database
            $achievement->image = 'storage/achievement/' . $nameToStore;
        }
    
        // Update other fields
        $achievement->title = $request->title;
        $achievement->count = $request->count;
    
        // Save changes
        $achievement->save();
    
        return redirect()->route('achievement.index')->with('success', 'Achievement Edited Successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement=Achievement::find($id);
      
        $achievement->delete();
        return redirect()->back()->with('success','Achievements Deleted Successfylly!!');
    }
}
