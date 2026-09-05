<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::withCount('posts')->orderBy('name')->get();

        return view('admin.blog.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = BlogCategory::generateUniqueSlug($validated['name']);

        BlogCategory::create($validated);

        return redirect()->route('admin.blog.categories.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, BlogCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        if ($validated['name'] !== $category->name) {
            $validated['slug'] = BlogCategory::generateUniqueSlug($validated['name'], $category->id);
        }

        $category->update($validated);

        return redirect()->route('admin.blog.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(BlogCategory $category)
    {
        if ($category->posts()->exists()) {
            return back()->with('error', 'This category has posts assigned to it. Reassign or delete those posts first.');
        }

        $category->delete();

        return redirect()->route('admin.blog.categories.index')->with('success', 'Category deleted successfully.');
    }
}
