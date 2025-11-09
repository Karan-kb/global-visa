<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\ResizeImg;
use App\Models\Questionaire;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    protected $folderPath, $path;

    public function __construct(){

        $this->middleware('auth');

        $this->folderPath = 'public/service';
        $this->path = public_path('storage/service');
        if (!file_exists($this->path)) {
            Storage::makeDirectory($this->folderPath);
            chmod($this->path, 0755);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=Service::orderBy('created_at','DESC')->get();

        return view('admin.service.service')->with('service',$service);
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
            'banner'=>'image',

        ]);
        $nameToStore='';
        // check if new fil is uploaded
        if($request->hasFile('banner')){
            $image=$request->banner;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title).time().'.'.$extension;
            $path=$image->storeAs('storage/services',$nameToStore);
            $path=$image->move('storage/services',$nameToStore);
        }

        $nameToStore1='';
        // check if new fil is uploaded
        if($request->hasFile('icon')){
            $image1=$request->icon;
            $extension =\File::extension($image1->getClientOriginalName());
            $nameToStore1 = Str::slug($request->title).time().'.'.$extension;
            $path1=$image1->storeAs('storage/services/icon',$nameToStore1);
            $path1=$image1->move('storage/services/icon',$nameToStore1);
        }

       

        $seoImageName = null;

        if ($request->hasFile('seo_image')) {
            $seoImage = $request->file('seo_image'); // Get the uploaded file
            $extension = $seoImage->getClientOriginalExtension(); // Get the file extension
            $seoImageName = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension; // Generate a unique name
            $path = $seoImage->storeAs('public/service', $seoImageName); // Save the image to storage
            $seoImagePath = 'service/' . $seoImageName; // Store the relative path in the database
        
            // Resize the image if needed (optional)
            ResizeImg::resizeImage(1200, 630, $seoImage, $this->folderPath . '/seo_' . $seoImageName);
        }

        $service = new Service;
        $service->title = $request->title;
        $service->body = $request->body ?? null;
        $service->image = $nameToStore ?: null;
        $service->order = $request->order;
        $service->seo_title = $request->seo_title;
        $service->seo_keyword = $request->seo_keyword;
        $service->seo_description = $request->seo_description;
        $service->seo_image =$seoImageName;
        $service->order = $request->order;
        $service->save();
        
        

        return redirect()->back()->with('success','Services Added Successfully!');
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
    // dd($id);
    $ser = Service::find($id);
    // dd($service);
    if (!$ser) {
        return redirect()->back()->with('error', 'Service not found!');
    }

    return view('admin.service.edit',compact('ser'));
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
        $service=Service::find($id);
        if(file_exists($request->banner)){
             //delete old file
             $imagename=$request->banner;
             Storage::delete('storage/services'.$imagename);
 
             // save new file
             $file=$request->banner;
             $extension=\File::extension($file->getClientOriginalName());
             $nameToStore = Str::slug($request->title).time().'.'.$extension;
 
             $file->storeAs('storage/services',$nameToStore);
             $file->move('storage/services',$nameToStore);
 
             $service->image=$nameToStore;
     
        }


        $seoImageName = $service->seo_image;


        if ($request->hasFile('seo_image')) {
            // Delete old SEO image if exists
            if (!empty($service->seo_image) && Storage::exists('public/service/' . $service->seo_image)) {
                Storage::delete('public/service/' . $service->seo_image);
            }
    
            // Save new SEO image
            $seoImage = $request->file('seo_image');
            $extension = $seoImage->getClientOriginalExtension();
            $seoImageName = Str::slug($request->title) . '-' . uniqid() . '-' . time() . '.' . $extension;
    
            $seoImage->storeAs('public/service', $seoImageName);
            ResizeImg::resizeImage(1200, 630, $seoImage, 'public/service/seo_' . $seoImageName);
    
            $service->seo_image = $seoImageName;
        }
    
        
        $service->title=$request->title;
        $service->body=$request->body;
        $service->order=$request->order;
        $service->seo_title = $request->seo_title;
        $service->seo_keyword = $request->seo_keyword;
        $service->seo_description = $request->seo_description;
        $service->seo_image =$seoImageName;

        $service->save();

        return redirect()->route('service.index')->with('success','Service Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::find($id);
        $questionaire=Questionaire::where('service_id',$service->id)->get();
        
        
        foreach($questionaire as $questionaire){
            
            if($questionaire!=NULL)
            $questionaire->delete();
        }
        $service->delete();
        return redirect()->back()->with('success','Services Deleted Successfylly!!');
    }
}
