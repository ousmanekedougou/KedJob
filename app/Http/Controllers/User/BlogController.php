<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Post::where('status',1)->get();
        return view('user.blog.index',compact('blogs'));
    }

    public function show($slug){
        $show_blog = Post::where('slug',$slug)->first();
        return view('user.blog.show',compact('show_blog'));
    }
}
