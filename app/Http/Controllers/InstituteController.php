<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InstituteController extends Controller
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
        $institute=Institute::orderBy('created_at','DESC')->get();
        $album=Album::all();
        //dd($institute);
        return view('admin.institute.institute')->with('institute',$institute)->with('album',$album);
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
        //dd($request->all());

        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'contact'=>'required',

        ]);

        if($request->course){
            
            $course = implode(",", $request->get('course'));
        }
        else{
            $course=null;
        }

        
        $nameToStore='';
        
        if($request->hasFile('banner')){
            $image=$request->banner;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->name).time().'.'.$extension;
            $path=$image->storeAs('storage/institute',$nameToStore);
            $path=$image->move('storage/institute',$nameToStore);
        }

        

        

        $institute=[
            'name'=>$request->name,
            'address'=>$request->address,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'album_id'=>$request->album_id,
            'body'=>$request->body,
            'image'=>($nameToStore=='')?NULL:$nameToStore,
            'course'=>$course
            
        ];
        Institute::create($institute);

        return redirect()->back()->with('success','Institute Added Successfully!');
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
        $institute=Institute::find($id);

        if($institute->course){
            $c=$institute->course;
            $courses= explode(",", $c);
        }
        else{
            $courses=null;
        }

        //dd($courses);
        $album=Album::all();
        return view('admin.institute.edit')->with('institute',$institute)->with('album',$album);
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
        $institute=Institute::find($id);

        if(file_exists($request->banner)){
             //delete old file
             $imagename=$request->banner;
             Storage::delete('storage/institute'.$imagename);
 
             // save new file
             $file=$request->banner;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->name).time().'.'.$extension;
 
             $file->storeAs('storage/institute',$nameToStore);
             $file->move('storage/institute',$nameToStore);
 
             $institute->image=$nameToStore;
     
        }

        if($request->course){
            
            $course = implode(",", $request->get('course'));
        }
        else{
            $course=null;
        }

        
        $institute->name=$request->name;
        $institute->address=$request->address;
        $institute->contact=$request->contact;
        $institute->email=$request->email;
        $institute->album_id=$request->album_id;
        $institute->body=$request->body;
        $institute->course=$course;
        
        

        $institute->save();

        return redirect()->route('institute.index')->with('success','Institute Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institute=Institute::find($id);
        $institute->delete();
        return redirect()->back()->with('success','Instituted Deleted Successfully');
    }
}
