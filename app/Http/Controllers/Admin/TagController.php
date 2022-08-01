<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::where('status',1)->get();
        $tags = Tag::all();
        return view('admin.tag.index',compact('tags','categorys'));
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
        $validators = $this->validate($request,[
            'title' => 'required|string',
            'status' => 'required|boolean',
        ]);
        Tag::create([
            'name' => $request->title,
            'status' => $request->status,
            'category_id' => $request->category,
            'slug' =>  str_replace('/','',Hash::make(Str::random(10).'category'.$request->title))
        ]);
        Toastr::success('Votre categorie a ete ajouter avec succes', 'Ajout Categorie', ["positionClass" => "toast-top-right"]);
        return back();
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
        //
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
        $validators = $this->validate($request,[
            'title' => 'required|string',
            'status' => 'required|boolean',
        ]);
        Tag::where('id',$id)->update([
            'name' => $request->title,
            'status' => $request->status,
            'category_id' => $request->category,
            'slug' =>  str_replace('/','',Hash::make(Str::random(10).'category'.$request->title))
        ]);
        Toastr::success('Votre categorie a ete modifier avec succes', 'Modifier Categorie', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
        Toastr::success('Votre categorie a ete supprimer avec succes', 'Suppression Categorie', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
