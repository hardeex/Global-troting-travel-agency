@extends('components.base')

@section('title', ($activeCategory ? $activeCategory->name . ' — ' : '') . 'Travel Blog — GlobeTrottle')
@section('meta_description', $activeCategory && $activeCategory->description ? $activeCategory->description : 'Travel tips, destination guides and inspiration from the GlobeTrottle team.')
@section('canonical', $activeCategory ? route('blog.category', $activeCategory->slug) : route('blog.index'))

@section('content')
<section class="pt-16" style="background: linear-gradient(135deg, rgba(30, 64, 175, 0.95) 0%, rgba(124, 58, 237, 0.95) 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
            @if($activeCategory)
                {{ $activeCategory->name }}
            @else
                Travel Stories & Guides
            @endif
        </h1>
        <p class="text-blue-100 text-lg max-w-2xl mx-auto">
            @if($activeCategory && $activeCategory->description)
                {{ $activeCategory->description }}
            @else
                Tips, destination guides and inspiration from the GlobeTrottle team.
            @endif
        </p>
    </div>
</section>

<section class="bg-gray-50 py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @include('feedback')

        <!-- Category Filter Pills -->
        <div class="flex flex-wrap gap-2 justify-center mb-12">
            <a href="{{ route('blog.index') }}"
                class="px-4 py-2 rounded-full text-sm font-medium transition-colors
                {{ !$activeCategory ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-100' }}">
                All Posts
            </a>
            @foreach($categories as $category)
                <a href="{{ route('blog.category', $category->slug) }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-colors
                    {{ $activeCategory && $activeCategory->id === $category->id ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-100' }}">
                    {{ $category->name }} <span class="opacity-60">({{ $category->posts_count }})</span>
                </a>
            @endforeach
        </div>

        @if($posts->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}"
                        class="group bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col">
                        <div class="relative h-48 bg-gray-200 overflow-hidden">
                            @if($post->featured_image_url)
                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $post->category->name }}
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <h2 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                {{ $post->title }}
                            </h2>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-1">{{ $post->excerpt }}</p>
                            <div class="flex items-center justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                                <span>{{ $post->published_at->format('M d, Y') }}</span>
                                <span>{{ $post->reading_time_minutes }} min read</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-xl shadow-sm border border-gray-200">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No posts yet</h3>
                <p class="text-gray-500">Check back soon for travel stories and guides.</p>
            </div>
        @endif
    </div>
</section>

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection
