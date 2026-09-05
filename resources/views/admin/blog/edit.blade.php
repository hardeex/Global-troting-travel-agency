@extends('dashboard.base')

@section('title', 'Edit Blog Post')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
    <div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6 mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Edit Blog Post</h1>
                <p class="text-gray-600 text-sm sm:text-base">{{ $post->title }}</p>
            </div>
            <div class="flex gap-3">
                @if($post->status === 'published')
                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank"
                        class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition-colors duration-200 text-sm">
                        View Live
                    </a>
                @endif
                <a href="{{ route('admin.blog.index') }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200 text-sm">
                    Back to Posts
                </a>
            </div>
        </div>
    </div>

    @include('feedback')

    @include('admin.blog._form', ['post' => $post, 'categories' => $categories])
</div>
@endsection
