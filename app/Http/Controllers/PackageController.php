<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Package;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
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
        $package=Package::orderBy('created_at','DESC')->get();
        return view('admin.activity.package')->with('package',$package);
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
            'title'=>'required',
            'banner'=>'image',

        ]);
        $nameToStore='';
        // check if new fil is uploaded
        if($request->hasFile('banner')){
            $image=$request->banner;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title).time().'.'.$extension;
            $path=$image->storeAs('storage/package',$nameToStore);
            $path=$image->move('storage/package',$nameToStore);
        }

        $package=[
            'title'=>$request->title,
            'location'=>$request->location,
            'body'=>is_null($request->body)?NULL:$request->body,
            'image'=>($nameToStore=='')?NULL:$nameToStore,
            'status'=>$request->status,
            //'slug'=>Str::slug($request->title),
            //'contentfield'=>$request->contentfield,
        ];
        Package::create($package);

        return redirect()->back()->with('success','Package Added Successfully!');
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
        $package=Package::find($id);
        return view('admin.activity.editpackage')->with('package',$package);
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
        $package=Package::find($id);
        if(file_exists($request->banner)){
             //delete old file
             $imagename=$request->banner;
             Storage::delete('storage/package'.$imagename);
 
             // save new file
             $file=$request->banner;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->title).time().'.'.$extension;
 
             $file->storeAs('storage/package',$nameToStore);
             $file->move('storage/package',$nameToStore);
 
             $package->image=$nameToStore;
     
        }
        
        $package->title=$request->title;
        $package->location=$request->location;
        $package->body=$request->body;
        $status=$request->status=='Active'?1:0;
        $package->status=$status;

        $package->save();

        return redirect()->route('package.index')->with('success','Package Information Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package=Package::find($id);
        $package->delete();
        return redirect()->back()->with('success','Package deleted successully');
        }
}
