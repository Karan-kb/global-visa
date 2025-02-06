<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Media;

class AlbumController extends Controller
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
        $albums=Album::all();
        return view('admin.gallery.gallery')->with('albums',$albums);
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
            'cover'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $image=$request->cover;
        $extension =\File::extension($image->getClientOriginalName());
        $nameToStore = Str::slug($request->title).time().'.'.$extension;
        $path=$image->storeAs('storage/gallery',$nameToStore);
        $path=$image->move('storage/gallery',$nameToStore);    

        $album=[
            'type'=>$request->type,
            'cover'=>$nameToStore,
            'title'=>$request->title,
        ];
        Album::create($album);
        return redirect()->back()->with('success','Album Created Successfully!');
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
        $album=Album::find($id);
        return view('admin.gallery.editgallery')->with('album',$album);
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
            'cover'=>'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $album=Album::find($id);
        
        $album->title=$request->title;

        if($album->type!=$request->type){
        return redirect()->back()->with('error','Cannot Change Type.... Album Not Empty!');

        }

        // check if new file is uploaded
        if($request->hasFile('cover')){
            $toDelete=$album->cover;
            // dd($toDelete);
            Storage::delete('storage/gallery/'.$toDelete);

            $image=$request->cover;
            $extension=\File::extension($image->getClientOriginalName());
            $nameToStore=Str::slug($request->title).time().'.'.$extension;
            $image->storeAs('storage/gallery',$nameToStore);
            $image->move('storage/gallery',$nameToStore);

            $album->cover=$nameToStore;
        }
        $album->save();
        return redirect()->route('album.index')->with('success','Album Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $album=Album::find($id);
        $media=Media::where('album_id',$album->id)->get();
        
        
        foreach($media as $media){
            
            if($media!=NULL)
            $media->delete();
        }
        $album->delete();
        return redirect()->back()->with('success','Album Deleted Successfylly!!');
    }


    public function addPhotos($id){
        
        $album=Album::find($id);
        return view('admin.gallery.addphotos')->with('album',$album);
        
    }


    public function storephotos(Request $request, $id)
    {
        $files=$request->file('file');

        foreach($files as $file){
            $fullName=$file->getClientOriginalName();
            $extension =\File::extension($fullName);

            $name=explode('.',$fullName)[0];
            $nameToStore = Str::slug($name).time().'.'.$extension;
            $file->storeAs('storage/gallery',$nameToStore);
            $file->move('storage/gallery',$nameToStore);

            Media::create([
                'title'=>$nameToStore,
                'album_id'=>$id
            ]);
        } 
        return redirect()->route('album.index')->with('success','Photo(s) added successfully!');
    }
}
