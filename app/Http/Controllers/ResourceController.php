<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Resource;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
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
        $resource=Resource::orderBy('created_at','DESC')->get();
        return view('admin.resource.resource')->with('resource',$resource);
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
            'title'=>'required',
            

        ]);
        $nameToStore='';
        // check if new fil is uploaded
        if($request->hasFile('banner')){
            $image=$request->banner;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title).time().'.'.$extension;
            $path=$image->storeAs('storage/resource',$nameToStore);
            $path=$image->move('storage/resource',$nameToStore);
        }

        $nameToStore1='';
        // check if new fil is uploaded
        if($request->hasFile('file')){
            $file=$request->file;
            $extension1 =\File::extension($file->getClientOriginalName());
            $nameToStore1 = Str::slug($request->title).time().'.'.$extension1;
            $path1=$file->storeAs('storage/resource/file',$nameToStore1);
            $path1=$file->move('storage/resource/file',$nameToStore1);
        }

        $resource=[
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'file'=>($nameToStore1=='')?NULL:$nameToStore1,
            'image'=>($nameToStore=='')?NULL:$nameToStore,
            
        ];
        Resource::create($resource);

        return redirect()->back()->with('success','Resource Added Successfully!');
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
        $resource=Resource::find($id);
        return view('admin.resource.edit')->with('resource',$resource);
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
            'title'=>'required',
            
        ]);

        $resource=Resource::find($id);
        $resource->title=$request->title;
        $resource->description=($request->description==NULL)?NULL:$request->description;
        $status=$request->status=='Active'?1:0;
        $resource->status=$status;

        // check if new fil is uploaded
        if($request->hasFile('banner')){
            $toDelete=$resource->image;
            // dd($toDelete);
            Storage::delete('storage/resource/'.$toDelete);

            $image=$request->banner;
            $extension=\File::extension($image->getClientOriginalName());
            $nameToStore=Str::slug($request->title).time().'.'.$extension;
            $image->move('storage/resource',$nameToStore);

            $resource->image=$nameToStore;
        }

        if($request->hasFile('file')){
            $toDelete=$resource->file;
            // dd($toDelete);
            Storage::delete('storage/resource/file'.$toDelete);

            $file=$request->file;
            $extension1=\File::extension($file->getClientOriginalName());
            $nameToStore1=Str::slug($request->title).time().'.'.$extension1;
            $file->move('storage/resource/file',$nameToStore1);

            $resource->file=$nameToStore1;
        }

        $resource->save();
        return redirect()->back()->with('success','Resources Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource=Resource::find($id);

        $resource->delete();

        return redirect()->back()->with('success','Resources deleted Successfully');
    }
}
