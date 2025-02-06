<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
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
        $event=Event::orderBy('created_at','DESC')->get();
        return view('admin.activity.event')->with('event',$event);
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
        // dd($request->all());
        $this->validate($request,[
            'title'=>'required',
            'banner'=>'image',
            'event_date'=> 'required',
            'event_date'=> 'nullable',

        ]);
        $nameToStore='';
        // check if new fil is uploaded
        if($request->hasFile('banner')){
            $image=$request->banner;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title).time().'.'.$extension;
            $path=$image->storeAs('storage/event',$nameToStore);
            $path=$image->move('storage/event',$nameToStore);
        }

        $event=[
            'title'=>$request->title,
            'location'=>$request->location,
            'event_date'=>$request->event_date,
            'event_time'=>$request->event_time,
            'body'=>is_null($request->body)?NULL:$request->body,
            'image'=>($nameToStore=='')?NULL:$nameToStore,
            //'slug'=>Str::slug($request->title),
            //'contentfield'=>$request->contentfield,
        ];
        Event::create($event);

        return redirect()->back()->with('success','Event Added Successfully!');
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
        $event=Event::find($id);
        return view('admin.activity.editevent')->with('event',$event);
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
        $event=Event::find($id);
        if(file_exists($request->banner)){
             //delete old file
             $imagename=$request->banner;
             Storage::delete('storage/event'.$imagename);
 
             // save new file
             $file=$request->banner;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->title).time().'.'.$extension;
 
             $file->storeAs('storage/event',$nameToStore);
             $file->move('storage/event',$nameToStore);
 
             $event->image=$nameToStore;
     
        }
        
        $event->title=$request->title;
        $event->location=$request->location;
        $event->event_date=$request->event_date;
        $event->event_time=$request->event_time;
        $event->body=$request->body;

        $event->save();

        return redirect()->route('event.index')->with('success','Events Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        $event->delete();
        return redirect()->back()->with('success','Event Deleted Succesfully!');
    }
}
