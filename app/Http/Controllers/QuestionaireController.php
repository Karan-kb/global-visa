<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Questionaire;
use App\Models\Destination;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class QuestionaireController extends Controller
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
        $service=Service::all();
        $questionaire=Questionaire::orderBy('created_at','DESC')->get();
        return view('admin.questionaire.question')->with('questionaire',$questionaire)
                                                  ->with('destination',$destination)
                                                  ->with('service',$service);
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
            'question'=>'required',
            'answer'=>'required'
        ]);

        

        $questionaire=[
            
            'destination_id'=>($request->destination_id==NULL)?NULL:$request->destination_id,
            'service_id'=>($request->service_id==NULL)?NULL:$request->service_id,
            'question'=>$request->question,
            'answer'=>$request->answer,
            'status'=>$request->status,
            'order'=>$request->order,
        ];

        Questionaire::create($questionaire);
        return redirect()->back()->with('success','Questionaire created Successfully');
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
        $questionaire=Questionaire::find($id);
        $destination=Destination::all();
        $service=Service::all();
        return view('admin.questionaire.edit')->with('questionaire',$questionaire)
                                              ->with('destination',$destination)
                                              ->with('service',$service);
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
            'question'=>'required',
            'answer'=>'required'
        ]);

        $questionaire=Questionaire::find($id);

        $questionaire->destination_id=($request->destination_id==NULL)?NULL:$request->destination_id;
        $questionaire->service_id=($request->service_id==NULL)?NULL:$request->service_id;
        $questionaire->question=$request->question;
        $questionaire->answer=$request->answer;
        $status=$request->status=='Active'?1:0;
        $questionaire->status=$status;
        $questionaire->order=$request->order;

        
        $questionaire->save();
        return redirect()->route('questionaire.index')->with('success','Questionaire Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionaire=Questionaire::find($id);
        $questionaire->delete();
        return redirect()->back()->with('success','Questionaire Deleted Succesfully!');
    }
}
