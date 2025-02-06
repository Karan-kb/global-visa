<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use App\Models\Destination;
use App\Models\DestinationHealth;

class DestinationHealthController extends Controller
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
        $healths = DestinationHealth::orderBy('created_at','DESC')->get();


        $destinations = Destination::all();

        return view('admin.destination_health.index',compact('healths','destinations'));
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

        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'nullable',
        ]);

    
    
        $selectedIconKey = $request->icon;

        // Get the actual SVG content from the config file
        $icons = config('svgs.icons');
        $iconToStore = isset($icons[$selectedIconKey]) ? $icons[$selectedIconKey]['icon'] : null;


        $reason = new DestinationHealth;
        $reason->destination_id = $request->destination_id ?? null;
        $reason->title = $request->title;
        $reason->description = $request->description ?? null;
    
        // Save the image path or name to the database
        if ($iconToStore) {
            $reason->image = $iconToStore; // Store SVG code as a string in the database
        }
    
        $reason->save();
    
        return redirect()->back()->with('success', 'Health Added Successfully!');
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
    $health = DestinationHealth::find($id);

    $destinations = Destination::all();
    // dd($service);
    if (!$health) {
        return redirect()->back()->with('error', 'Health not found!');
    }

    return view('admin.destination_health.edit',compact('health','destinations'));
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

        $this->validate($request, [
            'title' => 'required',
            'icon' => 'nullable', // Ensure an icon is selected
        ]);
        $reason = DestinationHealth::find($id);
        $selectedIconKey = $request->icon;

        // Get the actual SVG content from the config file
        $icons = config('svgs.icons');
        $iconToStore = isset($icons[$selectedIconKey]) ? $icons[$selectedIconKey]['icon'] : null;
    
        // Update other fields
        $reason->destination_id = $request->destination_id ?? null;
        $reason->title = $request->title;
        $reason->description = $request->description;

        if ($iconToStore) {
            $reason->image = $iconToStore; // Store SVG code as a string in the database
        }
    
        // Save changes
        $reason->save();
    
        return redirect()->route('destination-health.index')->with('success', 'reason Edited Successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $health=DestinationHealth::find($id);
      
        $health->delete();
        return redirect()->back()->with('success','Health Deleted Successfylly!!');
    }

}
