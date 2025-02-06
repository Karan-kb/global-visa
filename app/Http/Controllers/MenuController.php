<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Page;


class MenuController extends Controller
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
        $menuItems=Menu::all();
        $pages=Page::all();
        
        return view('admin.menu.menu')->with('menuItems',$menuItems)->with('pages',$pages);
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
        $this->validate( $request,[
            'title'=>'required|unique:menus',
            'order'=>'required',
            'parent'=>'required'
        ]);
        // dd($request->page);

        $menu=[
            'title'=>$request->title,
            'order'=>$request->order,
            //'slug'=>Str::slug($request->title),
            'parent_id'=>($request->parent=='None')?NULL:$request->parent,
            'page_id'=>($request->page==0)?NULL:$request->page,
        ];
        Menu::create($menu);
        
        return redirect()->back()->with('success','Menu Item Added Successfully!');
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
        $menuItems=Menu::all();
        $pages=Page::all();
        $menu=Menu::find($id);
        $page=Page::find($menu->id);
        return view('admin.menu.edit')->with('menu',$menu)->with('page',$page)
                                                          ->with('menuItems',$menuItems)
                                                          ->with('pages',$pages);
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
        $this->validate( $request,[
            'title'=>'required',
            'order'=>'required',
            'parent'=>'required'
        ]);
        $menu=Menu::find($id);

        $menu->title=$request->title;
        $menu->order=$request->order;
        
        $parent_id=($request->parent=='None')?NULL:$request->parent;
        //dd($parent_id);
        $menu->parent_id=$parent_id;

        $page_id=($request->page=='None')?NULL:$request->page;
        $menu->page_id=$page_id;
        
        $menu->slug=Str::slug($request->title);

        $menu->save();

        return redirect()->route('menu.index')->with('success','Menu Item updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu=Menu::find($id);
        $childs=Menu::where('parent_id',$menu->id)->get();

        $menu->delete();
        $page_id=$menu->page_id;
        $page=Page::find($page_id);
        
        if($page_id!=NULL)
        $page->delete();
        
        foreach($childs as $menu){
            $menu->delete();
            $page_id=$menu->page_id;
            $page=Page::find($page_id);
            
            if($page_id!=NULL)
            $page->delete();
        }

        return redirect()->back()->with('success','Menu Item Deleted Successfully!');
    }
}
