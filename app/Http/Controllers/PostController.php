<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function dataPost()
    {
        // $posts = Post::orderByDesc('id')->get();
        $posts = Post::get();
        return view('posts', [
            'dataPost' => $posts
    ]);
    }

    public function create()
    {
        return view('tambah-posts');
    }

    public function edit($id)
    {
        // dd($id);
        $post= Post::find($id);
        // dd($post);
        return view('edit-posts', [
            'postingan' => $post
        ]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Post::create($request->all());

        return redirect('/posts');
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $post= Post::find($id);
        $post->update($request->all());
        return redirect('/posts');
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('detail-posts', [
        'postingan' => $post
        ]);
    }
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }
}
