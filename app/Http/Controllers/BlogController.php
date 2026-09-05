<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::orderBy('name')->withCount('posts')->get();

        $posts = BlogPost::published()
            ->with('category')
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blog.index', [
            'posts' => $posts,
            'categories' => $categories,
            'activeCategory' => null,
        ]);
    }

    public function category(BlogCategory $category)
    {
        $categories = BlogCategory::orderBy('name')->withCount('posts')->get();

        $posts = BlogPost::published()
            ->where('blog_category_id', $category->id)
            ->with('category')
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blog.index', [
            'posts' => $posts,
            'categories' => $categories,
            'activeCategory' => $category,
        ]);
    }

    public function show(string $slug)
    {
        $post = BlogPost::published()
            ->with(['category', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPosts = BlogPost::published()
            ->where('blog_category_id', $post->blog_category_id)
            ->where('id', '!=', $post->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
