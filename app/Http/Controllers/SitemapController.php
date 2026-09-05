<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;

class SitemapController extends Controller
{
    public function index()
    {
        $staticPages = [
            ['url' => route('index'), 'changefreq' => 'daily', 'priority' => '1.0'],
            ['url' => route('about'), 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['url' => route('contact'), 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['url' => route('destinations'), 'changefreq' => 'daily', 'priority' => '0.9'],
            ['url' => route('blog.index'), 'changefreq' => 'daily', 'priority' => '0.8'],
            ['url' => route('privacy.policy'), 'changefreq' => 'yearly', 'priority' => '0.3'],
            ['url' => route('terms.conditions'), 'changefreq' => 'yearly', 'priority' => '0.3'],
        ];

        $blogCategories = BlogCategory::whereHas('posts', fn ($query) => $query->published())
            ->get()
            ->map(fn ($category) => [
                'url' => route('blog.category', $category->slug),
                'lastmod' => $category->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.6',
            ]);

        $blogPosts = BlogPost::published()->get()->map(fn ($post) => [
            'url' => route('blog.show', $post->slug),
            'lastmod' => $post->updated_at->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ]);

        $urls = collect($staticPages)
            ->concat($blogCategories)
            ->concat($blogPosts);

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }
}
