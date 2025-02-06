<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
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
        $cat=Category::orderBy('created_at','DESC')->get();
        return view('admin.blog.category')->with('cat',$cat);
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
        ]);
       

        $cat=[
            'name'=>$request->name,
            
            
        ];
        Category::create($cat);

        return redirect()->back()->with('success','Category Added Successfully!');
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
        $cat=Category::find($id);
        return view('admin.blog.editcategory')->with('cat',$cat);
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
        $category=Category::find($id);
        
        
        $category->name=$request->name;
       

        $category->save();

        return redirect()->route('category.index')->with('success','Category Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category=Category::find($id);
        $blog=Blog::where('category_id',$id)->get();
        foreach($blog as $b)
        {
            $b->delete();
        }
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
