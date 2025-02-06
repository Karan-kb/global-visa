<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;



class NewsletterController extends Controller
{
    public function subscribe(Request $request){

        try{
          

        $validated = $request->validate([
            'email' => 'required|unique:newsletters,email'
        ]);
      

        Newsletter::create([
            'email' => e($request->email),
        ]);

        return redirect()->back()->with('success' ,'Newsletter Subscription Succesfull!');
    } catch (\Exception $ex){
        dd($ex->getMessage());
        return redirect()->back()->with('error', 'Something went wrong!');
    }
    }


    public function index(){

        $newsletters = Newsletter::all();

        
        return view('admin.newsletter.index',compact('newsletters'));
    }


    public function destroy($id)
    {
        $newsletter=Newsletter::find($id);

        $newsletter->delete();
        
        return redirect()->back()->with('success','Newsletter Deleted Succesfully!');
    }
}
