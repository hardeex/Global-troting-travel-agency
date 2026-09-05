@extends('components.base')

@section('title', ($post->meta_title ?: $post->title) . ' — GlobeTrottle Blog')
@section('meta_description', $post->meta_description ?: $post->excerpt)
@section('og_type', 'article')
@if($post->featured_image_url)
    @section('og_image', $post->featured_image_url)
@endif
@section('canonical', route('blog.show', $post->slug))

@section('structured_data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $post->title,
    'description' => $post->meta_description ?: $post->excerpt,
    'image' => $post->featured_image_url,
    'datePublished' => optional($post->published_at)->toIso8601String(),
    'dateModified' => $post->updated_at->toIso8601String(),
    'author' => [
        '@type' => 'Person',
        'name' => optional($post->author)->name ?? 'GlobeTrottle',
    ],
    'mainEntityOfPage' => route('blog.show', $post->slug),
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endsection

@section('content')
<article class="pt-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <a href="{{ route('blog.category', $post->category->slug) }}"
            class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold mb-4 hover:bg-blue-200 transition-colors">
            {{ $post->category->name }}
        </a>

        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

        <div class="flex items-center gap-4 text-sm text-gray-500 mb-8 pb-8 border-b border-gray-200">
            <span>By {{ optional($post->author)->name ?? 'GlobeTrottle Team' }}</span>
            <span>&middot;</span>
            <span>{{ $post->published_at->format('M d, Y') }}</span>
            <span>&middot;</span>
            <span>{{ $post->reading_time_minutes }} min read</span>
        </div>

        @if($post->featured_image_url)
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                class="w-full h-auto rounded-xl mb-10 shadow-sm">
        @endif

        <div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-blue-600">
            {!! $post->content !!}
        </div>
    </div>

    @if($relatedPosts->count() > 0)
        <div class="bg-gray-50 border-t border-gray-200">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">More in {{ $post->category->name }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $related)
                        <a href="{{ route('blog.show', $related->slug) }}"
                            class="group bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                            <div class="h-32 bg-gray-200">
                                @if($related->featured_image_url)
                                    <img src="{{ $related->featured_image_url }}" alt="{{ $related->title }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="text-sm font-medium text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2">
                                    {{ $related->title }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="bg-blue-600">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-center">
            <h2 class="text-xl sm:text-2xl font-bold text-white mb-3">Ready to plan your next trip?</h2>
            <p class="text-blue-100 mb-6">Let our team put together a personalised travel package for you.</p>
            <a href="{{ route('make-a-request') }}"
                class="inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 transition-colors">
                Schedule With Us
            </a>
        </div>
    </div>
</article>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection
