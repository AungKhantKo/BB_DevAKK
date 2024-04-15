<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // dd($posts);
        return view('frontend.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        // dd($post);
        // echo $id;
        return view('frontend.b_post', compact('post'));
    }
}
