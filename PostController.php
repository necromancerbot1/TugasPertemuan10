<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 1. index — tampilkan semua post dengan pagination
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    // 2. create — form tambah post baru
    public function create()
    {
        return view('posts.create');
    }

    // 3. store — simpan post baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|min:3|max:255',
            'body'   => 'required|min:10',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Bonus: upload gambar
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil ditambahkan!');
    }

    // 4. show — tampilkan detail 1 post (Route Model Binding)
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // 5. edit — form edit post (Route Model Binding)
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 6. update — update post di database
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'  => 'required|min:3|max:255',
            'body'   => 'required|min:10',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Bonus: upload gambar baru
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post berhasil diperbarui!');
    }

    // 7. destroy — soft delete post
    public function destroy(Post $post)
    {
        $post->delete(); // soft delete karena model pakai SoftDeletes

        return redirect()->route('posts.index')
            ->with('error', 'Post berhasil dihapus.');
    }

    // Bonus: pencarian
    public function search(Request $request)
    {
        $query = $request->input('q');
        $posts = Post::where('title', 'like', "%{$query}%")
                     ->orWhere('body', 'like', "%{$query}%")
                     ->latest()
                     ->paginate(5)
                     ->withQueryString();

        return view('posts.index', compact('posts', 'query'));
    }
}
