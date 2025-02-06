<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
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
        $news=News::orderBy('created_at','DESC')->get();
        return view('admin.activity.news')->with('news',$news);
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
            $path=$image->storeAs('storage/news',$nameToStore);
            $path=$image->move('storage/news',$nameToStore);
        }

        $news=[
            'title'=>$request->title,
            'location'=>$request->location,
            'body'=>is_null($request->body)?NULL:$request->body,
            'image'=>($nameToStore=='')?NULL:$nameToStore,
            //'slug'=>Str::slug($request->title),
            //'contentfield'=>$request->contentfield,
        ];
        News::create($news);

        return redirect()->back()->with('success','News Added Successfully!');
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
        $news=News::find($id);
        return view('admin.activity.editnews')->with('news',$news);
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
        $news=News::find($id);
        if(file_exists($request->banner)){
             //delete old file
             $imagename=$request->banner;
             Storage::delete('storage/news'.$imagename);
 
             // save new file
             $file=$request->banner;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->title).time().'.'.$extension;
 
             $file->storeAs('storage/news',$nameToStore);
             $file->move('storage/news',$nameToStore);
 
             $news->image=$nameToStore;
     
        }
        
        $news->title=$request->title;
        $news->location=$request->location;
        $news->body=$request->body;

        $news->save();

        return redirect()->route('news.index')->with('success','News Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=News::find($id);
        $news->delete();
        return redirect()->back()->with('success','News Deleted Succesfully!');
    }
}
