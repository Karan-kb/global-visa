<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Booking;
use App\Models\EnglishTest;
use App\Models\Package;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class BookingController extends Controller
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
        
        $bookings=Booking::orderByDesc('updated_at')->get();
        $students = Student::all();
        $courses = EnglishTest::all();
        $package = Package::all();
        return view('admin.crm.booking')->with('bookings',$bookings)->with('students',$students)->with('courses',$courses)->with('package',$package);
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
            'student_id'=>'required',
            'course_id'=>'required',
            'start_date'=>'required|date',
            'package'=>'required',
            'comment'=>'nullable|string',
            'previous_score'=>'nullable|string',
            'attempts'=>'nullable|string',
            'status'=>'required'
        ]);

        $booking=[
            'start_date'=>$request->start_date,
            'package_id'=>$request->package,
            'comment'=>$request->comment,
            'previous_score'=>$request->previous_score,
            'attempts'=>$request->attempts,
            'status'=>$request->status,
            'course_id'=>$request->course_id,
            'student_id'=>$request->student_id,
            
            
        ];
        Booking::create($booking);

        return redirect()->back()->with('success','New Registration Added Successfully!');
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
        $bookings=Booking::find($id);
        $students = Student::all();
        $courses = EnglishTest::all();
        $package = Package::all();
        return view('admin.crm.editbooking')->with('bookings',$bookings)->with('students',$students)->with('courses',$courses)->with('package',$package);
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
        $request->validate([
            'student_id'=>'required',
            'course_id'=>'required',
            'start_date'=>'required|date',
            'package'=>'required',
            'comment'=>'nullable|string',
            'previous_score'=>'nullable|string',
            'attempts'=>'nullable|string',
            'status'=>'required'
        ]);

        $bookings=Booking::find($id);
        //dd($bookings);

        $bookings->student_id=$request->student_id;
        $bookings->course_id=$request->course_id;
        $bookings->start_date=$request->start_date;
        $bookings->package_id=$request->package;
        $bookings->comment=$request->comment;
        $bookings->previous_score=$request->previous_score;
        $bookings->attempts=$request->attempts;
        $bookings->status=$request->status;

        $bookings->save();

        return redirect()->route('bookings.index')->with('success','Registration Edited Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookings=Booking::find($id);
        $bookings->delete();
        return redirect()->back()->with('success','Registration Deleted Successfully');
    }
}
