<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Album;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $album=Album::find($id);
        $items=$album->medias;
        // print_r($items);
        // foreach($items as $item){
        //     echo $item['title'];
        // }
        return view('admin.gallery.media')->with('items',$items)->with('album',$album);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media=Media::find($id);
        return view('admin.gallery.editmedia')->with('media',$media);
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
            'title'=>'name',
            
        ]);

        $media=Media::find($id);
        $album_id=$media->album_id;
        
        
        $media->name=$request->name;
        $media->designation=$request->designation;

        $media->save();
        return redirect("/media/{$album_id}")->with('info','Media Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media=Media::find($id);
        
        $media->delete();
        return redirect()->back()->with('success','Media Deleted Successfylly!!');
    }
}
