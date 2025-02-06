<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        if(Auth::user()->role==1){
            
        $users=User::all();
        return view('admin.user.index')->with('user',$users);
        
        }
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
        if(Auth::user()->role==1){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
            ]);
    
            Auth::login($user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]));
    
            event(new Registered($user));
        }
        

        return redirect()->back()->with('success','User Created Successfully');
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
        if(Auth::user()->role==1){
            $user=User::find($id);
        //dd($user);

        return view('admin.user.edit')->with('user',$user);
        }
        
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
        if(Auth::user()->role==1)
        {
            $user=User::find($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                
            ]);
    
            //dd($request->all());
            if($request->password)
            {
                if($request->password == $request->password_confirmation){
                    $password=Hash::make($request->password);
                }
                else{
                    return redirect()->back()->with('error','Password MisMatched!!');
                }
                
            }
            else{
                $password=$user->password;
            }
    
           
    
            //dd($password);
    
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$password;
    
            $user->save();
    
            return redirect()->route('user.index')->with('success','User Modified Successfully');
        }
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role==1){
            $user=User::find($id);

        $user->delete();

        return redirect()->back()->with('error','User Removed SuccessFully');
        }
        
    }
}
