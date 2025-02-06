<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Highlight;
use App\Models\Destination;
use Illuminate\Support\Facades\Storage;

class HighlightController extends Controller
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
        $destination=Destination::all();
        $highlight=Highlight::orderBy('created_at','DESC')->get();
        return view('admin.highlight.highlight')->with('highlight',$highlight)->with('destination',$destination);
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
            'founded'=>'required',
            'flag'=>'image',

        ]);
        $flag='';
        // check if flag is uploaded
        if($request->hasFile('flag')){
            $image=$request->flag;
            $extension =\File::extension($image->getClientOriginalName());
            $flag = Str::slug($request->capital).time().'.'.$extension;
            $path=$image->storeAs('storage/highlight',$flag);
            $path=$image->move('storage/highlight',$flag);
        }

        $animal_image='';
        // check if flag is uploaded
        if($request->hasFile('animal_image')){
            $image=$request->animal_image;
            $extension =\File::extension($image->getClientOriginalName());
            $animal_image = Str::slug($request->animal_name).time().'.'.$extension;
            $path=$image->storeAs('storage/highlight',$animal_image);
            $path=$image->move('storage/highlight',$animal_image);
        }

        

        $highlight=[
            'destination_id'=>$request->destination_id,
            'founded'=>$request->founded,
            'capital'=>$request->capital,
            'area'=>$request->area,
            'form'=>$request->form,
            'population'=>$request->population,
            'animal_name'=>$request->animal_name,
            'animal_image'=>($animal_image=='')?NULL:$animal_image,
            'flag'=>($flag=='')?NULL:$flag,
            //'slug'=>Str::slug($request->capital),
            //'contentfield'=>$request->contentfield,
        ];
        Highlight::create($highlight);

        return redirect()->back()->with('success','Highlight Added Successfully!');
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
        $highlight=Highlight::find($id);
        $destination=Destination::all();
        return view('admin.highlight.edit')->with('highlight',$highlight)->with('destination',$destination);
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
        $highlight=Highlight::find($id);

        if(file_exists($request->flag)){
             //delete old file
             $imagename=$request->flag;
             Storage::delete('storage/highlight'.$imagename);
 
             // save new file
             $file=$request->flag;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->capital).time().'.'.$extension;
 
             $file->storeAs('storage/highlight',$nameToStore);
             $file->move('storage/highlight',$nameToStore);
 
             $highlight->flag=$nameToStore;
     
        }


        if(file_exists($request->animal_image)){
            //delete old file
            $imagename1=$request->animal_image;
            Storage::delete('storage/highlight'.$imagename1);

            // save new file
            $file1=$request->animal_image;
            $extension1=\File::extension($file1->getClientOriginalName());
            $nameToStore1 = Str::slug($request->capital).time().'.'.$extension1;

            $file1->storeAs('storage/highlight',$nameToStore1);
            $file1->move('storage/highlight',$nameToStore1);

            $highlight->animal_image=$nameToStore1;
    
       }

        
        $highlight->destination_id=$request->destination_id;
        $highlight->founded=$request->founded;
        $highlight->capital=$request->capital;
        $highlight->area=$request->area;
        $highlight->form=$request->form;
        $highlight->population=$request->population;
        $highlight->animal_name=$request->animal_name;
        

        $highlight->save();

        return redirect()->route('highlight.index')->with('success','Highlight Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $highlight=Highlight::find($id);
        $highlight->delete();
        return redirect()->back()->with('success','Highlight Deleted Succesfully!');
    }
}
