<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
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
        $brand=Brand::orderBy('created_at','DESC')->get();
        return view('admin.brand.brand')->with('brand',$brand);
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
            'banner'=>'image',

        ]);
        $nameToStore='';
        // check if new fil is uploaded
        if($request->hasFile('banner')){
            $image=$request->banner;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title).time().'.'.$extension;
            $path=$image->storeAs('storage/brand',$nameToStore);
            $path=$image->move('storage/brand',$nameToStore);
        }

        $brand=[
            'name'=>$request->name,
            'url'=>is_null($request->url)?NULL:$request->url,
            'image'=>($nameToStore=='')?NULL:$nameToStore,
            //'slug'=>Str::slug($request->name),
            
        ];
        Brand::create($brand);

        return redirect()->back()->with('success','Brand Added Successfully!');
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
        $brand=Brand::find($id);
        return view('admin.brand.edit')->with('brand',$brand);
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
        $brand=Brand::find($id);
        if(file_exists($request->banner)){
             //delete old file
             $imagename=$request->banner;
             Storage::delete('storage/brand'.$imagename);
 
             // save new file
             $file=$request->banner;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->title).time().'.'.$extension;
 
             $file->storeAs('storage/brand',$nameToStore);
             $file->move('storage/brand',$nameToStore);
 
             $brand->image=$nameToStore;
     
        }
        
        $brand->name=$request->name;
        $brand->url=$request->url;

        $brand->save();

        return redirect()->route('brand.index')->with('success','Brand Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('success','Brand Deleted Succesfully!');
    }
}
