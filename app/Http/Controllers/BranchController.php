<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Branch;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
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
        $branch=Branch::orderBy('created_at','DESC')->get();
        return view('admin.branch.branch')->with('branch',$branch);
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
            'address'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'map'=>'required',
            

        ]);
       

        $branch=[
            'name'=>$request->name,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'map'=>$request->map,
            
        ];
        Branch::create($branch);

        return redirect()->back()->with('success','Branch Added Successfully!');
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
        
        $branch=Branch::find($id);
        return view('admin.branch.edit')->with('branch',$branch);
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
        $branch=Branch::find($id);
        
        
        $branch->name=$request->name;
        $branch->address=$request->address;
        $branch->contact=$request->contact;
        $branch->email=$request->email;
        $branch->map=$request->map;

        $branch->save();

        return redirect()->route('branch.index')->with('success','Branch Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch=Branch::find($id);
        $branch->delete();
        return redirect()->back()->with('success','Branch Deleted Succesfully!');
    }
}
