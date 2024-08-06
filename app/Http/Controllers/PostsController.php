<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->excerpt = $request->input('excerpt');
        // $post->content = $request->input('content');

        // $post->save();

        //methodo 2

        /* Post::create($request->all()); */

        // methodo 3
        // $request->validate([
        //     'title' => 'required|min:3',
        //     'excerpt' => 'required|min:10',
        //     'content' => 'required|min:10',

        // ]);
        Post::create([
            'title'=>$request->input('title'),
            'excerpt'=> $request->input('excerpt'),
            'content'=> $request->input('content'),
        ]);

        return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        // $post = Post::findOrFail($id);
        
        $comments = $post->comments;

        return view('posts.show')->with([
            'post' => $post,
            'comments'=> $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $this->authorize('update', $post);
        return view('posts.edit')->with([
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // $this->authorize('update', $post);
        $post->update([
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'content' => $request->input('content'),
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // $this->authorize('delete', $post);
        $post->delete();
        return redirect('/');
    }
}
