<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
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
        $blog=Blog::orderBy('created_at','DESC')->get();
        $category=Category::all();
        return view('admin.blog.blog')->with('blog',$blog)->with('category',$category);
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
            $path=$image->storeAs('storage/blog',$nameToStore);
            $path=$image->move('storage/blog',$nameToStore);
        }

        $blog=[
            'title'=>$request->title,
            'category_id'=>$request->category,
            'featured'=>$request->featured,
            'location'=>$request->location,
            'body'=>is_null($request->body)?NULL:$request->body,
            'short_description'=>is_null($request->short_description)?NULL:$request->short_description,
            'image'=>($nameToStore=='')?NULL:$nameToStore,
            //'slug'=>Str::slug($request->title),
            //'contentfield'=>$request->contentfield,
        ];
        Blog::create($blog);

        return redirect()->back()->with('success','Blog Added Successfully!');
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
        $blog=Blog::find($id);
        // dd($service);
        $category=Category::all();
        return view('admin.blog.edit')->with('blog',$blog)->with('category',$category);
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
        $blog=Blog::find($id);
        if(file_exists($request->banner)){
             //delete old file
             $imagename=$request->banner;
             Storage::delete('storage/blog'.$imagename);
 
             // save new file
             $file=$request->banner;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->title).time().'.'.$extension;
 
             $file->storeAs('storage/blog',$nameToStore);
             $file->move('storage/blog',$nameToStore);
 
             $blog->image=$nameToStore;
     
        }
        
        $blog->title=$request->title;
        $blog->category_id=$request->category;
        $blog->featured=$request->featured;
        $blog->location=$request->location;
        $blog->body=$request->body;
        $blog->short_description=$request->short_description;

        $blog->save();

        return redirect()->route('blog.index')->with('success','Blog Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=Blog::find($id);
        $blog->delete();
        return redirect()->back()->with('success','Blog Deleted Succesfully!');
    }
}
