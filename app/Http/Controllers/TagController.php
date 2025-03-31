<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('posts.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag_name' => 'required|unique:tags,tag_name|max:255',
            'tag_desc' => 'nullable|string'
        ]);

        Tag::create([
            'tag_name' => $request->tag_name,
            'tag_slug' => Str::slug($request->tag_name),
            'tag_desc' => $request->tag_desc,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('posts.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('posts.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'tag_name' => 'required|max:255|unique:tags,tag_name,' . $tag->id,
            'tag_desc' => 'nullable|string'
        ]);

        $tag->update([
            'tag_name' => $request->tag_name,
            'tag_slug' => Str::slug($request->tag_name),
            'tag_desc' => $request->tag_desc,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
<<<<<<< HEAD
}
=======
}







>>>>>>> f3d27d2b564292000d192cbc02b99b7939146628
