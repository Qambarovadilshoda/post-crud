<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('post', compact('posts'));
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
    public function store(StorePostRequest $request)
    {
        $image = $request->file('image');
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $uploadedImage = $image->storeAs('images', $fileName, 'public');
        Post::create([
            'name' => $request->name,
            'body' => $request->body,
            'image' => $uploadedImage,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            @unlink(storage_path('app/public/' . $post->image));
        }

        $image = $request->file('image');
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $updatedImage = $image->storeAs('images', $fileName, 'public');

        $post->name = $request->name;
        $post->body = $request->body;
        $post->image = $updatedImage;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            @unlink(storage_path('app/public/' . $post->image));
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function uploadImage(string $path)
    {
        //
    }
}
