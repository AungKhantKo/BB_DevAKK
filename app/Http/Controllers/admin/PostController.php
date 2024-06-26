<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.posts.create', compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $posts = Post::create($request->all());

        $fileName= time(). '.' .$request->image->extension();

        $upload = $request->image->move(public_path('images/'),$fileName);
        if($upload){
            $posts->image = "/images/".$fileName;
        }
        $posts->save();
        return redirect()->route('backend.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // echo $id;
        $categories = Category::all();
        // $users = User::all();
        $post = Post::find($id);
        // dd($post);
        return view('admin.posts.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        // dd($request);
        // echo $id;
        $post = Post::find($id);
        $post->update($request->all());

        if($request->hasFile('new_image')){
            // file upload
            $fileName = time().'.'.$request->new_image->extension();

            $upload = $request->new_image->move(public_path('images/'), $fileName);
            if($upload) {
                $post->image = "/images/".$fileName;
            }
        }else{
            $post->image = $request->old_image;
        }
        $post->save();
        return redirect()->route('backend.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // echo $id;
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('backend.posts.index');
    }
}

