<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use App\Models\Admin\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Post::all();
        $categorys = Category::where('status',1)->get();
        $tags = Tag::where('status',1)->get();
        return view('admin.blog.index',compact('blogs','categorys','tags'));
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
            'date' => 'required|date',
            'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf',
            'resume' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|boolean',
            'tag' => 'required|numeric',
            'category' => 'required|numeric',
        ]);
        if($request->hasFile('image')){
            $imageName = $request->image->store('public/Post');
        }

        $post = Post::create([
            'title' => $request->title,
            'expiration_at' => $request->date,
            'image' => $imageName,
            'resume' => $request->resume,
            'detail' => $request->body,
            'status' => $request->status,
            'slug' =>  str_replace('/','',Hash::make(Str::random(10).$request->date.$request->title))
        ]);
        $post->tags()->sync($request->tag);
        $post->categorys()->sync($request->category);
        Toastr::success('Votre article a ete ajouter avec succes', 'Ajout d\'offre', ["positionClass" => "toast-top-right"]);
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
         $validator = $this->validate($request,[
            'title' => 'required|string',
            'resume' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|boolean',
        ]);
        $update = Post::where('id',$id)->first();
        $imageName = '';
        $status = '';
        $date = '';

        if($request->image == '')
        {
            $imageName = $update->image;
        }else{

            if($request->hasFile('image'))
            {
                $imageName = $request->image->store('public/Job');
                Storage::delete($update->image);
            }
        }
        if ($request->date == '') {
            $date = $update->expiration_at;
        }else {
            $date = $request->date;
        }
        $update->title = $request->title;
        $update->expiration_at = $date;
        $update->resume = $request->resume;
        $update->detail = $request->body;
        $update->image = $imageName;
        $update->status = $request->status;
        $update->slug = str_replace('/','',Hash::make(Str::random(10).$date.$request->title));
        $update->save();
        $update->tags()->sync($request->tag);
        $update->categorys()->sync($request->category);
        Toastr::success('Votre article a ete modifier avec succes', 'Modification d\'offre', ["positionClass" => "toast-top-right"]);
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
        $post_delete = Post::where('id',$id)->first();
        $imgdel = $post_delete->image;
        Storage::delete($imgdel); 
        $post_delete->delete();
        Toastr::success('Votre article a ete supprimer avec success', 'Supression Annonce', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
