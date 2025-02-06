<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\LanguageTest;
use Illuminate\Support\Facades\Storage;

class LanguageTestController extends Controller
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
        $language=LanguageTest::all();
        $title="Language";
        $method="languagetest";
        return view('admin.test.test')->with('test',$language)->with('title',$title)->with('method',$method);
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

        $language=[
            'title'=>$request->title,
            'body'=>($request->body==NULL)?NULL:$request->body,
            'image'=>$nameToStore,
            'status'=>$request->status,
            'order'=>$request->order,
        ];

        LanguageTest::create($language);
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
        $language=LanguageTest::find($id);
        $title="Language";
        $method="languagetest";
        return view('admin.test.edit')->with('test',$language)->with('title',$title)->with('method',$method);
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

        $language=LanguageTest::find($id);
        $language->title=$request->title;;
        $language->body=($request->body==NULL)?NULL:$request->body;
        $status=$request->status=='Active'?1:0;
        $language->status=$status;
         $language->order=$request->order;

        // check if new fil is uploaded
        if($request->hasFile('image')){
            $toDelete=$language->image;
            // dd($toDelete);
            Storage::delete('storage/test/'.$toDelete);

            $image=$request->image;
            $extension=\File::extension($image->getClientOriginalName());
            $nameToStore=Str::slug($request->name).time().'.'.$extension;
            $image->move('storage/test',$nameToStore);

            $language->image=$nameToStore;
        }
        $language->save();
        return redirect()->route('languagetest.index')->with('success','Test Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language=LanguageTest::find($id);
        $language->delete();
        return redirect()->back()->with('success','Language Test Test Deleted Succesfully!');
    }
}
