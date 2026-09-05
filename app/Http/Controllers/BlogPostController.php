<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Services\CloudinaryUploader;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class BlogPostController extends Controller
{
    public function __construct(protected CloudinaryUploader $uploader)
    {
    }

    public function index()
    {
        $posts = BlogPost::with('category')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        if ($request->hasFile('featured_image')) {
            try {
                $validated['featured_image_url'] = $this->uploader->upload(
                    $request->file('featured_image'),
                    'blog',
                    'blog_'
                );
            } catch (Exception $e) {
                Log::error('Blog featured image upload failed: ' . $e->getMessage());

                return back()->withInput()->with('error', 'Image upload failed. Please try again.');
            }
        }

        unset($validated['featured_image']);
        $validated['slug'] = $this->resolveSlug($validated);
        $validated['content'] = Purifier::clean($validated['content'], 'blog_post');
        $validated['user_id'] = auth()->id();

        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin.blog.edit', compact('post', 'categories'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $validated = $this->validateRequest($request);

        if ($request->hasFile('featured_image')) {
            try {
                $validated['featured_image_url'] = $this->uploader->upload(
                    $request->file('featured_image'),
                    'blog',
                    'blog_'
                );
            } catch (Exception $e) {
                Log::error('Blog featured image upload failed: ' . $e->getMessage());

                return back()->withInput()->with('error', 'Image upload failed. Please try again.');
            }
        }

        unset($validated['featured_image']);
        $validated['slug'] = $this->resolveSlug($validated, $post);
        $validated['content'] = Purifier::clean($validated['content'], 'blog_post');

        if ($validated['status'] === 'published' && empty($validated['published_at']) && !$post->published_at) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully.');
    }

    protected function validateRequest(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:5120',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);
    }

    protected function resolveSlug(array $validated, ?BlogPost $post = null): string
    {
        $desiredSlug = !empty($validated['slug']) ? Str::slug($validated['slug']) : $validated['title'];

        if ($post && $desiredSlug === $post->slug) {
            return $post->slug;
        }

        return BlogPost::generateUniqueSlug($desiredSlug, $post?->id);
    }
}
