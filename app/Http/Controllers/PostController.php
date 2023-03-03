<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $datos['posts'] = Post::paginate(10);

        return view('post.index', $datos);
    }

    public function getMyPosts()
    {
        $user = Auth::user();
        $posts = $user->posts;
        return view('post.index', ['posts' => $posts]);
    }

    public function getAll()
    {
        $datos['posts'] = Post::all();

        return view('allpost', $datos);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->status = $request->input('status');
        $post->user_id = auth()->user()->id; // El ID del usuario autenticado
        $post->save();

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }

}