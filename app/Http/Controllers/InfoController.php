<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class InfoController extends Controller
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
        $infos=Info::find(1);
        // dd($infos);
        return view('admin.info.info')->with('info',$infos);
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
        //
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
        $info=Info::find($id);
        return view('admin.info.edit')->with('info',$info);
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
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'website'=>'required',
            'email'=>'required',
            'logo'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'favicon'=>'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $info=Info::find($id);
        $info->name=$request->name;
        $info->address=$request->address;
        // $info->address1=$request->address1;
        $info->website=$request->website;
        $info->admission_year=$request->admission_year;
        $info->admission_season=$request->admission_season;
        $info->footer_about=$request->footer_about;
        $info->email=$request->email;
        $info->phone= $request->phone==NULL?NULL:$request->phone;
        $info->mobile= $request->mobile==NULL?NULL:$request->mobile;
        $info->facebook= $request->facebook==NULL?NULL:$request->facebook;
        $info->linkedIn= $request->linkedIn==NULL?NULL:$request->linkedIn;
        $info->twitter= $request->twitter==NULL?NULL:$request->twitter;
        $info->fax= $request->fax==NULL?NULL:$request->fax;
        $info->pobox= $request->pobox==NULL?NULL:$request->pobox;
        $info->opens= $request->opens==NULL?NULL:$request->opens;
        $info->closes= $request->closes==NULL?NULL:$request->closes;
        $info->map= $request->map==NULL?NULL:$request->map;
        $info->intro_video= $request->intro_video==NULL?NULL:$request->intro_video;
        $info->study_destination_video= $request->study_destination_video==NULL?NULL:$request->study_destination_video;
        if($request->hasFile('logo')){
            $toDelete=$info->logo;
            Storage::delete('storage/info/'.$toDelete);

            $image=$request->logo;
            $extension=\File::extension($image->getClientOriginalName());
            $nameToStore=Str::slug($request->name).time().'.'.$extension;
            $image->move('storage/info',$nameToStore);

            $info->logo=$nameToStore;
        }
        if($request->hasFile('favicon')){
            $toDelete=$info->favicon;
            Storage::delete('storage/info/'.$toDelete);

            $image=$request->favicon;
            $extension=\File::extension($image->getClientOriginalName());
            $nameToStore=Str::slug($request->name).'favicon'.time().'.'.$extension;
            $image->move('storage/info',$nameToStore);
            $info->favicon=$nameToStore;
        }
        $info->save();
        return redirect()->route('info.index')->with('success','Info Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
