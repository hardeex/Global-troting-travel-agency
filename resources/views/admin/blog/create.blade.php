@extends('dashboard.base')

@section('title', 'New Blog Post')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
    <div class="bg-white rounded-xl shadow-sm border border-sky-100 p-6 mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">New Blog Post</h1>
                <p class="text-gray-600 text-sm sm:text-base">Write a new post for the GlobeTrottle blog</p>
            </div>
            <a href="{{ route('admin.blog.index') }}"
                class="inline-flex items-center justify-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200 text-sm">
                Back to Posts
            </a>
        </div>
    </div>

    @include('feedback')

    @include('admin.blog._form', ['post' => null, 'categories' => $categories])
</div>
@endsection
