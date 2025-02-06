<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Booking;
use App\Models\PreviousCourse;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class StudentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function myStudents()
    {
        
        //$students=Student::orderBy('updated_at','desc')->get();
        $students=Student::whereHas('bookings',  function (Builder $query) {
            $query->where('status', 'confirmed')->orWhere('status', 'completed');
        })->orderByDesc('updated_at')->get();

        //dd($students);

        return view('admin.crm.student')->with('students',$students);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::orderBy('updated_at','desc')->get();

        return view('admin.crm.student')->with('students',$students);
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
        $request->validate([
            'name'=>'required|string',
            'image'=>'nullable|image',
            'phone'=>'required|string',
            'email'=>'required|unique:students|email',
            'nationality'=>'required|string',
            'state'=>'required|string',
            'address'=>'required|string',
            'dob'=>'required'
        ]);

        $nameToStore='';
        // check if new fil is uploaded
        if($request->hasFile('banner')){
            $image=$request->banner;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title).time().'.'.$extension;
            $path=$image->storeAs('storage/crm',$nameToStore);
            $path=$image->move('storage/crm',$nameToStore);
        }

        
        $student=[
            'name'=>$request->name,
            'image'=>($nameToStore=='')?NULL:$nameToStore,
            'dob'=>$request->dob,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'nationality'=>$request->nationality,
            'state'=>$request->state,
            'address'=>$request->address,
            'post_code'=>$request->post_code,
            
        ];
        Student::create($student);

        return redirect()->back()->with('success','Student Added Successfully!');
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
        $student=Student::find($id);

        return view('admin.crm.editstudent')->with('student',$student);
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
        $request->validate([
            'name'=>'required|string',
            'image'=>'nullable|image',
            'phone'=>'required|string',
            'email'=>'required|email|unique:students,email,'.$id,
            'nationality'=>'required|string',
            'state'=>'required|string',
            'address'=>'required|string',
            'dob'=>'required',
        ]);

        $student=Student::find($id);

        $nameToStore='';
        // check if new fil is uploaded
        if($request->hasFile('banner')){
            $image=$request->banner;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title).time().'.'.$extension;
            $path=$image->storeAs('storage/crm',$nameToStore);
            $path=$image->move('storage/crm',$nameToStore);
            $student->image=$nameToStore;
        }

        $student->name=$request->name;
        $student->phone=$request->phone;
        $student->address=$request->address;
        $student->email=$request->email;
        $student->nationality=$request->nationality;
        $student->state=$request->state;
        $student->dob=$request->dob;
        $student->post_code=$request->post_code;

        $student->save();

        return redirect()->route('students.index')->with('success','Student Modified Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::find($id);

        $bookings=Booking::where('student_id',$id)->get();
        foreach($bookings as $b)
        {
            $b->delete();
        }

        $previous_course=PreviousCourse::where('student_id',$id)->get();
        foreach($previous_course as $pc)
        {
            $pc->delete();
        }

        $document=Document::where('student_id',$id)->get();
        foreach($document as $d)
        {
            $d->delete();
        }
        
        $student->delete();

        return redirect()->back()->with('success','Student Deleted Successfully');
    }
}
