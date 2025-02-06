<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Document;
use File;

class DocumentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function multipleDocuments(Student $student)
    {
       // dd($student);
        return view('admin.crm.document_multiple')
            ->with('student',$student);
    }
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
        //dd($request->all());
        $request->validate([
            'student_id'=>'required',
            'filename'=>'required|file|mimes:jpeg,jpg,bmp,png,gif,pdf',
            'description'=>'required|string',
        ]);


        $data=$request->except('_token');

        if($request->filename) {
            $file = $request->filename;

            $allowedMimeTypes = ['image/jpeg','image/jpg','image/gif','image/png','image/bmp'];

            if( in_array($request->filename->getMimeType(), $allowedMimeTypes) )
            {
                $data['type'] = 'image';
            }
            else
            {
                $data['type'] = 'file';
            }

            $data['filename'] = "Document-" . date('Ymdhis') . rand(0, 1234) . "." . $request->filename->getClientOriginalName();

            $destinationPath = public_path('/storage/crm/docs');
            $file->move($destinationPath, $data['filename']);
        }


        $document=new Document();

        $document->fill($data);
        $document->save($data);
        return redirect('multiple-documents/'.$document->student_id);
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
    public function edit(Document $document)
    {
        //dd($document);
        $students=Student::all();
        return view('admin.crm.document_edit')
            ->with('document',$document)
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
    public function update(Request $request,Document $document)
    {
        $request->validate([
            'student_id'=>'required',
            'filename'=>'file|mimes:jpeg,jpg,bmp,png,gif,pdf',
            'description'=>'required|string',
        ]);

        $data=$request->except('_token');

        if($request->filename){

            $allowedMimeTypes = ['image/jpeg','image/jpg','image/gif','image/png','image/bmp'];

            if( in_array($request->filename->getMimeType(), $allowedMimeTypes) ){
                $data['type'] = 'image';
            }
            else
            {
                $data['type'] = 'file';
            }

            if($document->filename) {
                $path = public_path() . '/storage/crm/docs';
                if (File::exists($path . '/' . $document->filename))
                    unlink($path . '/' . $document->filename);
            }

            $file = $request->file('filename');
            $data['filename'] = "Document-" . date('Ymdhis') . rand(0, 1234) . "." . $request->filename->getClientOriginalName();

            $destinationPath = public_path('/storage/crm/docs');
            $file->move($destinationPath, $data['filename']);

        }

        //dd($input['filename']);

        $document->fill($data);

        $document->save($data);
        
        return redirect('multiple-documents/'.$document->student_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $id = $document->student_id;
        if($document->filename) {
            $path = public_path() . '/storage/crm/docs';
            if (File::exists($path . '/' . $document->filename))
                unlink($path . '/' . $document->filename);
        }
        $document->delete();
        return redirect('multiple-documents/'.$id);
    }
}
