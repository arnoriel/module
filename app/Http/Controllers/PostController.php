<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=Post::all();
        return view ('post.index', compact ('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $post = new Post;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/post/', $name);
            $post->gambar = $name;
        } 
            $post->judul = $request->judul;
            $post->deskripsi = $request->deskripsi;
            $post->save();
            return redirect()->route('post.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'gambar' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $post = Post::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/post/', $name);
            $post->gambar = $name;
        } 
            $post->judul = $request->judul;
            $post->deskripsi = $request->deskripsi;
            $post->save();
            return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index');
    }
}
