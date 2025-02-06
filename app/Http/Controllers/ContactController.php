<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $contacts = Contact::all();
        
        return view('admin.contact.index',compact('contacts'));
    }


    public function show($id){

        $contact = Contact::where('id', $id)->first();
        
        return view('admin.contact.show',compact('contact'));
    }


    public function destroy($id)
    {
        $contact=Contact::find($id);

        $contact->delete();
        
        return redirect()->back()->with('success','Contact Deleted Succesfully!');
    }
}
