<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('posts.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_name' => 'required|max:255|unique:categories,cat_name',
            'cat_desc' => 'nullable|string|max:500'
        ]);

        Category::create([
            'cat_name' => $validated['cat_name'],
            'cat_slug' => Str::slug($validated['cat_name']),
            'cat_desc' => $validated['cat_desc'] ?? null,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('posts.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('posts.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'cat_name' => 'required|max:255|unique:categories,cat_name,' . $category->id,
            'cat_desc' => 'nullable|string|max:500'
        ]);

        $category->update([
            'cat_name' => $validated['cat_name'],
            'cat_slug' => Str::slug($validated['cat_name']),
            'cat_desc' => $validated['cat_desc'] ?? null,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Prevent deleting if it has posts
        if ($category->posts()->exists()) {
            return redirect()->route('categories.index')->with('error', 'Cannot delete category with associated posts.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
