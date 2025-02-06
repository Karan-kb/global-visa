<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\EnglishTest;
use Illuminate\Support\Facades\Storage;

class EnglishTestController extends Controller
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
        $english=EnglishTest::all();
        $title="English";
        $method="englishtest";
        return view('admin.test.test')->with('test',$english)->with('title',$title)->with('method',$method);
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
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'body'=>'required',
            
        ]);

        $image=$request->image;
        $extension =\File::extension($image->getClientOriginalName());
        $nameToStore = Str::slug($request->name).time().'.'.$extension;
        $image->move('storage/test',$nameToStore); 

        $english=[
            'title'=>$request->title,
            'body'=>($request->body==NULL)?NULL:$request->body,
            'image'=>$nameToStore,
            'status'=>$request->status,
            'order'=>$request->order,
        ];

        EnglishTest::create($english);
        return redirect()->back()->with('success','Test created Successfully');
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
        $english=EnglishTest::find($id);
        $title="English";
        $method="englishtest";
        return view('admin.test.edit')->with('test',$english)->with('title',$title)->with('method',$method);
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
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'body'=>'required',
            
        ]);

        $english=EnglishTest::find($id);
        $english->title=$request->title;;
        $english->body=($request->body==NULL)?NULL:$request->body;
        $status=$request->status=='Active'?1:0;
        $english->status=$status;
         $english->order=$request->order;

        // check if new fil is uploaded
        if($request->hasFile('image')){
            $toDelete=$english->image;
            // dd($toDelete);
            Storage::delete('storage/test/'.$toDelete);

            $image=$request->image;
            $extension=\File::extension($image->getClientOriginalName());
            $nameToStore=Str::slug($request->name).time().'.'.$extension;
            $image->move('storage/test',$nameToStore);

            $english->image=$nameToStore;
        }
        $english->save();
        return redirect()->route('englishtest.index')->with('success','Test Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $english=EnglishTest::find($id);
        $english->delete();
        return redirect()->back()->with('success','English Test Deleted Succesfully!');
    }
}
