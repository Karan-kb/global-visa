<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Package;
use App\Models\News;
use App\Models\Event;
use App\Models\Blog;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmt=Comment::orderBy('created_at','DESC')->get();
        return view('admin.comment')->with('cmt',$cmt);
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
            'email'=>'required',
            'message'=>'required',

        ]);

        $path=$request->path;
        $slug=$request->slug;
        $bid='';
        $eid='';
        $nid='';
        $pid='';
        if($path=='blog')
        {
            $b=Blog::where('slug',$slug)->first();
            $bid=$b->id;
        }

        if($path=='event')
        {
            $e=Event::where('slug',$slug)->first();
            $eid=$e->id;
        }
        if($path=='news')
        {
            $n=News::where('slug',$slug)->first();
            $nid=$n->id;
        }
        if($path=='package')
        {
            $p=Package::where('slug',$slug)->first();
            $pid=$p->id;
        }
        

        $cmt=[
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
            'blog_id'=>$bid,
            'news_id'=>$nid,
            'package_id'=>$pid,
            'event_id'=>$eid,
            
        ];
        Comment::create($cmt);

       return redirect()->back()->with('success','Successfully Commented!!!!!');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cmt=Comment::find($id);
        $cmt->delete();
        return redirect()->back()->with('success','Comment deleted Successfully');
    }
}
