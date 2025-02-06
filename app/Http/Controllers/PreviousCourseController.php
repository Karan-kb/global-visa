<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use File;
use App\Models\Student;
use App\Models\PreviousCourse;

class PreviousCourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

        $path=public_path().'/storage/crm/result';
        if(!File::exists($path)){
            File::makeDirectory($path,0777,true,true);
        }
    }


    public function previousCourses(Student $student)
    {
        $previous_courses=$student->previousCourses;
        //dd($previous_courses);
        
        return view('admin.crm.student_previous_course')
            ->with('previous_courses',$previous_courses)
            ->with('student',$student)
            ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $previous_courses=PreviousCourse::all();
        $student=Student::whereHas('bookings',  function (Builder $query) {
            $query->where('status', 'confirmed')->orWhere('status', 'completed');
        })->get();

        return view('admin.crm.previous_course')->with('previous_courses',$previous_courses)->with('student',$student);
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
        $request->validate([
            'student_id'=>'required',
            'name'=>'required|string',
            'reading'=>'required|string',
            'writing'=>'required|string',
            'listening'=>'required|string',
            'speaking'=>'required|string',
            'attempts'=>'required|string',
            'result'=>'nullable|image',
        ]);
        $data=$request->except('_token');

        $previous_course=new PreviousCourse();
        if($request->result){
            $result = $request->file('result');
            $input['image_name'] =  "Result-".date('Ymdhis').rand(0,1234).".".$request->result->getClientOriginalName();;

            $destinationPath = public_path('/storage/crm/result');
            $result->move($destinationPath, $input['image_name']);

            $data['result']=$input['image_name'];
        }        
        $previous_course->fill($data);
        $previous_course->save($data);
        return redirect('student-previous-courses/'.$request->student_id)->with('success','Result Added Successfully!!');
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
    public function edit(PreviousCourse $previous_course)
    {
        // $students=Student::all();
        $students=Student::whereHas('bookings',  function (Builder $query) {
            $query->where('status', 'confirmed')->orWhere('status', 'completed');
        })->get();
        return view('admin.crm.previous_course_edit')
            ->with('previous_course',$previous_course)
            ->with('students',$students)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PreviousCourse $previous_course)
    {
        $request->validate([
            'student_id'=>'required',
            'name'=>'required|string',
            'reading'=>'required|string',
            'writing'=>'required|string',
            'listening'=>'required|string',
            'speaking'=>'required|string',
            'attempts'=>'required|string',
            'result'=>'nullable|image',
        ]);
        $data=$request->except('_token');
        if($request->result){
            
            $path=public_path().'/storage/crm/result';
            if($previous_course->result){
                if(File::exists($path.'/'.$previous_course->result))
                    unlink($path.'/'.$previous_course->result);
            }

            $result = $request->file('result');
            $input['image_name'] =  "Result-".date('Ymdhis').rand(0,1234).".".$request->result->getClientOriginalName();
            $result->move($path, $input['image_name']);

            $data['result']=$input['image_name'];

        }


        $previous_course->fill($data);

        $previous_course->save($data);
        
        return redirect('student-previous-courses/'.$request->student_id)->with('success','Modified Successfully!!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreviousCourse $previous_course)
    {
        if($previous_course->result){
            $path=public_path().'/storage/crm/results';
            if(File::exists($path.'/'.$previous_course->result))
                unlink($path.'/'.$previous_course->result);
        }
        $previous_course->delete();
        return redirect('previous-courses');
    }
}
