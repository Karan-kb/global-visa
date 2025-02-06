<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
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
        $testimonials=Testimonial::all();
        return view('admin.testimonial.index')->with('testimonials',$testimonials);
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
            'name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'body'=>'required',
            'about'=>'required'
        ]);

        $image=$request->image;
        $extension =\File::extension($image->getClientOriginalName());
        $nameToStore = Str::slug($request->name).time().'.'.$extension;
        $image->move('storage/testimonials',$nameToStore); 

        $testimonial=[
            'name'=>$request->name,
            'about'=>($request->about==NULL)?NULL:$request->about,
            'body'=>($request->body==NULL)?NULL:$request->body,
            
            'image'=>$nameToStore,
            'status'=>$request->status,
        ];

        Testimonial::create($testimonial);
        return redirect()->back()->with('success','Testimonial created Successfully');
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
        $testimonial=Testimonial::find($id);
        return view('admin.testimonial.edit')->with('testimonial',$testimonial);
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
        $this->validate($request,[
            'name'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'body'=>'required',
            'about'=>'required'
        ]);

        $testimonial=Testimonial::find($id);
        $testimonial->name=$request->name;
        $testimonial->about=($request->about==NULL)?NULL:$request->about;
        $testimonial->body=($request->body==NULL)?NULL:$request->body;
        $status=$request->status=='Active'?1:0;
        $testimonial->status=$status;

        // check if new fil is uploaded
        if($request->hasFile('image')){
            $toDelete=$testimonial->image;
            // dd($toDelete);
            Storage::delete('storage/testimonials/'.$toDelete);

            $image=$request->image;
            $extension=\File::extension($image->getClientOriginalName());
            $nameToStore=Str::slug($request->name).time().'.'.$extension;
            $image->move('storage/testimonials',$nameToStore);

            $testimonial->image=$nameToStore;
        }
        $testimonial->save();
        return redirect()->back()->with('success','Testimonial Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial=Testimonial::find($id);
        $testimonial->delete();
        return redirect()->back()->with('success','Testimonial Deleted Succesfully!');
    }
}
