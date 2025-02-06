<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Destination;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
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
        $destination=Destination::all();
        $city=City::orderBy('created_at','DESC')->get();
        return view('admin.city.city')->with('city',$city)->with('destination',$destination);
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
        $this->validate($request,[
            'destination_id'=>'required',
            'city'=>'required',
            ]);

            $city='';
        // check if flag is uploaded
        if($request->hasFile('image')){
            $image=$request->image;
            $extension =\File::extension($image->getClientOriginalName());
            $city = Str::slug($request->city).time().'.'.$extension;
            $path=$image->storeAs('storage/city',$city);
            $path=$image->move('storage/city',$city);
        }
    

        $city=[
            'destination_id'=>$request->destination_id,
            'city'=>$request->city,
            'image'=>($city=='')?NULL:$city,
            
        ];
        City::create($city);

        return redirect()->back()->with('success','City Added Successfully!');
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
        $city=City::find($id);
        $destination=Destination::all();
        return view('admin.city.edit')->with('city',$city)->with('destination',$destination);
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
        $city=City::find($id);

        if(file_exists($request->image)){
            //delete old file
            $imagename=$request->image;
            Storage::delete('storage/city'.$imagename);

            // save new file
            $file=$request->image;
            $extension=\File::extension($file->getClientOriginalName());
            $nameToStore = Str::slug($request->capital).time().'.'.$extension;

            $file->storeAs('storage/city',$nameToStore);
            $file->move('storage/city',$nameToStore);

            $city->image=$nameToStore;
    
       }

        $city->destination_id=$request->destination_id;
        $city->city=$request->city;
        $city->save();

        return redirect()->route('city.index')->with('success','City Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city=City::find($id);
        $city->delete();
        return redirect()->back()->with('success','City Deleted Succesfully!');
    }
}
