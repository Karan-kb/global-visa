<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class CustomPageController extends Controller
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
        $page=Page::orderBy('created_at','DESC')->get();
        return view('admin.page.page')->with('page',$page);
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
            $path=$image->storeAs('storage/page_banners',$nameToStore);
            $path=$image->move('storage/page_banners',$nameToStore);
        }

        $page=[
            'title'=>$request->title,
            'body'=>is_null($request->body)?NULL:$request->body,
            'image'=>($nameToStore=='')?NULL:$nameToStore,
            //'slug'=>Str::slug($request->title),
            //'contentfield'=>$request->contentfield,
        ];
        Page::create($page);

        return redirect()->back()->with('success','Page Added Successfully!');
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
        $page=Page::find($id);
        return view('admin.page.edit')->with('page',$page);
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
        //dd($request->all());
        $page=Page::find($id);
        if(file_exists($request->banner)){
             //delete old file
             $imagename=$request->banner;
             Storage::delete('storage/page_banners'.$imagename);
 
             // save new file
             $file=$request->banner;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->title).time().'.'.$extension;
 
             $file->storeAs('storage/page_banners',$nameToStore);
             $file->move('storage/page_banners',$nameToStore);
 
             $page->image=$nameToStore;
     
        }
        
        $page->title=$request->title;
        $page->body=$request->body;

        $page->save();

        return redirect()->route('page.index')->with('success','Page Edited Succesfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Page::find($id);
        $page->delete();
        return redirect()->back()->with('success','Page Deleted Succesfully!');

    }
}
