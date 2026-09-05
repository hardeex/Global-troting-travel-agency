@extends('dashboard.base')

@section('title', 'Manage Blog Posts')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Manage Blog Posts</h1>
                <p class="mt-1 sm:mt-2 text-sm text-gray-600">Write, edit and publish blog posts</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('admin.blog.categories.index') }}"
                    class="w-full sm:w-auto bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center gap-2">
                    Manage Categories
                </a>
                <a href="{{ route('admin.blog.create') }}"
                    class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    New Post
                </a>
            </div>
        </div>
    </div>

    @include('feedback')

    @if($posts->count() > 0)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Published</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900 max-w-xs truncate">{{ $post->title }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $post->category->name }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    {{ $post->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800' }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $post->published_at ? $post->published_at->format('M d, Y') : '—' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.blog.edit', $post->slug) }}"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.blog.destroy', $post->slug) }}" method="POST"
                                        onsubmit="return confirm('Delete &quot;{{ addslashes($post->title) }}&quot;? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mt-6">
            {{ $posts->links() }}
        </div>
    @else
        <div class="text-center py-12 bg-white rounded-xl shadow-sm border border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-2">No blog posts yet</h3>
            <p class="text-gray-500 mb-6">Get started by writing your first post.</p>
            <a href="{{ route('admin.blog.create') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                Write First Post
            </a>
        </div>
    @endif
</div>
@endsection
