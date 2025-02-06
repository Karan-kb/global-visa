<?php

namespace App\Http\Controllers;

use Auth;
use Exception;
use App\Models\Slider;
use App\Models\ResizeImg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SliderController extends Controller
{
    protected $folderPath, $path;
    public function __construct()
    {
        $this->folderPath = 'public/slider';
        $this->path = public_path('storage/slider');
        if (!file_exists($this->path)) {
            Storage::makeDirectory($this->folderPath);
            chmod($this->path, 0755);
        }
    }
   
    public function index(Request $request)
    {
        $sliders=Slider::orderBy('order_no')->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
       try
       {
        // dd($request->all());
            $validator = Validator::make($request->all(), [
               'heading' => 'required|max:255',
               'title' => 'required|max:255',
               'button_text'=>'nullable|max:50',
               'button_url'=>'nullable|url',
               'youtube_url'=>'nullable|url',
               'image'=>'required|mimes:jpg,jpeg,png|max:9000',
               'image_1'=>'mimes:jpg,jpeg,png|max:9000',
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->with('error', 'Couldnot create ')->withInput()->withErrors($validator);
            }

            $imageName = '';
            if ($request->hasFile('image'))
            {
                $image= $request->file('image');
                $imageName = uniqid(time() . '.') . '.' . $request->file('image')->extension();
                $image->storeAs($this->folderPath, $imageName);
                ResizeImg::resizeImage(200, 200, $image, $this->folderPath . '/thumb_' . $imageName);
            }


            $nextimageName = '';

            if ($request->hasFile('image_1'))
            {

                $nextimage= $request->file('image_1');
                $nextimageName = uniqid(time() . '.') . '.' . $request->file('image_1')->extension();
                $nextimage->storeAs($this->folderPath, $nextimageName);
                ResizeImg::resizeImage(200, 200, $nextimage, $this->folderPath . '/thumb_' . $nextimageName);
            }
             
            // dd()

            

            $slider = new Slider();
            $slider->order_no = Slider::max('order_no') + 1;
            $slider->title = $request->title;
            $slider->heading = $request->heading;
            $slider->button_text = $request->button_text;
            $slider->button_url = $request->button_url;
            $slider->youtube_url = $request->youtube_url;
            $slider->status = ($request->status == 'on') ? 1 : 0;
            $slider->created_by = auth()->user()->name;
            $slider->image = $imageName;
            $slider->image_1 = $nextimageName ?? 'Cool'; // Fallback to 'Cool' if no second image is uploaded
    
            // Save the slider
            $slider->save();

            return redirect()->route('slider.index')->with('success', 'Successfully Created!!');
       }catch (Exception $ex)
        {
            dd($ex->getMessage());
            return back()->with('error', 'Something went wrong!!');
        }
    }

   
    public function show($id)
    {
        try {
            $slider=Slider::findOrFail($id);

            $data = [
                'heading' => $slider->heading,
                'title' => $slider->title,
                'youtube_url'=>$slider->youtube_url,
                'image'=>asset('storage/slider/'.$slider->image),
                'button_text'=>$slider->button_text,
                'button_url'=>$slider->button_url,
            ];

            return response()->json(['data'=>$data], 200); 
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Data not found.'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }


    public function edit($id)
    {
        $slider = Slider::find($id);
        if(!$slider){
            return back()->with('error','Silder not Found!');
        }
        return view('admin.slider.edit', compact('slider'));
    }

    
    public function update(Request $request)
    {
        try
        {
         
            $id=$request->id;
            $validator = Validator::make($request->all(), [
                'heading' => 'required|max:255|unique:sliders,title,' . $id,
                'title' => 'required|max:255',
                'button_text'=>'nullable|max:50',
                'button_url'=>'nullable|url',
                'youtube_url'=>'nullable|url',
                'image'=>'nullable|mimes:jpg,jpeg,png|max:9000',
                'image_1'=>'nullable|mimes:jpg,jpeg,png|max:9000',
            ]);

            if ($validator->fails())
            {

                return redirect()->back()->with('error', 'Couldnot edit')->withInput()->withErrors($validator);
            }

            $slider=Slider::find($id);
            
            if(!$slider){
                return redirect()->route('admin.slider.index')->with('error','Slider not found!');
            }
            $slider->title     = $request->title;
            $slider->heading     = $request->heading;
            $slider->button_text = $request->button_text;
            $slider->button_url = $request->button_url;
            $slider->youtube_url = $request->youtube_url;
            $slider->status   = ($request->status == 'on') ? 1 : 0;
            $slider->updated_by=auth()->user()->name;

            if ($request->hasFile('image'))
            {
                $oldImg=$slider->image;
                $image = $request->file('image');
                $imageName = uniqid(time() . '.') . '.' . $image->extension();
                $image->storeAs($this->folderPath, $imageName);
                ResizeImg::resizeImage(200, 200, $image, $this->folderPath . '/thumb_' . $imageName);
                $slider->image = $imageName;
                if($oldImg){
                    Storage::delete('public/slider/'.$oldImg);
                    Storage::delete('public/slider/thumb_'.$oldImg);
                }
            }

            if ($request->hasFile('image_1')) {
             
                $oldImg1 = $slider->image_1;
                $nextimage = $request->file('image_1');

             
                
                // Generate a unique name for the uploaded image_1 and store it
                $nextimageName = uniqid(time() . '.') . '.' . $nextimage->extension();
              
                $nextimage->storeAs($this->folderPath, $nextimageName);
            
                // Resize the image_1 and save the thumbnail
                ResizeImg::resizeImage(200, 200, $nextimage, $this->folderPath . '/thumb_' . $nextimageName);
            
                // Set the new image_1 name
                $slider->image_1 = $nextimageName;
            
                // If an old image_1 exists, delete it
                if ($oldImg1) {
                    Storage::delete('public/slider/' . $oldImg1);
                    Storage::delete('public/slider/thumb_' . $oldImg1);
                }
            }

          

            $slider->save();

            return redirect()->route('slider.index')->with('success', 'Successfully Updated!!');
        }
        catch (\Exception $ex)
        {
            dd($ex->getMessage());


            return redirect()->route('slider.index')->with('error', 'Something went wrong!!');
        }
    }


    public function destroy($id)
    {
        $slider=Slider::find($id);
        $slider->delete();
        return redirect()->back()->with('success','Slider Deleted Succesfully!');
    }
   
    public function delete(Request $request)
    {

        try
        {
            $slider=Slider::where('id', $request->id)->first();
            if(!$slider){
                return redirect()->route('admin.slider.index')->with('error', 'Slider not found!!');
            }
            if($slider->image){
                Storage::delete('public/slider/'.$slider->image);
                Storage::delete('public/slider/thumb_'.$slider->image);
            }
            $slider->delete();
            return redirect()->route('admin.slider.index')->with('success', 'Successfully Deleted!!');
        }
        catch (Exception $ex)
        {
            return redirect()->route('admin.slider.index')->with('error', 'Something went wrong!!');
        }
    }
   

    public function set_order(Request $request)
    {

        $slider = new Slider();
        $list_order = $request['list_order'];

        $this->saveList($list_order);
        $data = array('status' => 'success');
        echo json_encode($data);
        exit;
    }

    public function saveList($list, &$m_order = 0)
    {

        foreach ($list as $item) {
            $m_order++;
            $updateData = array("order_no" => $m_order);
            Slider::where('id', $item['id'])->update($updateData);
        }
    }
}
