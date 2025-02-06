<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Destination;
use App\Models\DestinationReason;



class DestinationReasonController extends Controller
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
        $reasons=DestinationReason::orderBy('created_at','DESC')->get();

        $destinations = Destination::all();

        return view('admin.destination_reason.index',compact('reasons','destinations'));
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
        'icon' => 'nullable', // Ensure an icon is selected
    ]);

    // Retrieve the selected icon from the dropdown
    $selectedIconKey = $request->icon;

    // Get the actual SVG content from the config file
    $icons = config('svgs.icons');
    $iconToStore = isset($icons[$selectedIconKey]) ? $icons[$selectedIconKey]['icon'] : null;

    // Save data in the database
    $reason = new DestinationReason;
    $reason->destination_id = $request->destination_id;
    $reason->title = $request->title;
    $reason->description = $request->description ?? null;

    // Store the selected SVG icon in the `image` column
    if ($iconToStore) {
        $reason->image = $iconToStore; // Store SVG code as a string in the database
    }

    $reason->save();

    return redirect()->back()->with('success', 'Reason Added Successfully!');
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
    $reason = DestinationReason::find($id);

    $destinations = Destination::all();
    // dd($service);
    if (!$reason) {
        return redirect()->back()->with('error', 'reason not found!');
    }

    return view('admin.destination_reason.edit',compact('reason','destinations'));
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

    $reason = DestinationReason::findOrFail($id);

    // Retrieve the selected icon from the dropdown
    $selectedIconKey = $request->icon;

    // Get the actual SVG content from the config file
    $icons = config('svgs.icons');
    $iconToStore = isset($icons[$selectedIconKey]) ? $icons[$selectedIconKey]['icon'] : null;

    // Update fields
    $reason->destination_id = $request->destination_id ?? null;
    $reason->title = $request->title;
    $reason->description = $request->description ?? null;

    // Update SVG icon if selected
    if ($iconToStore) {
        $reason->image = $iconToStore; // Store SVG code as a string in the database
    }

    $reason->save();

    return redirect()->route('destination-reason.index')->with('success', 'Reason Updated Successfully!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reason=DestinationReason::find($id);
      
        $reason->delete();
        return redirect()->back()->with('success','reasons Deleted Successfylly!!');
    }

}
