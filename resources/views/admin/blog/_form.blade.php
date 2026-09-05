@php
    $post = $post ?? null;
@endphp

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">

<form action="{{ $post ? route('admin.blog.update', $post->slug) : route('admin.blog.store') }}"
    method="POST" enctype="multipart/form-data" class="space-y-6" id="blogPostForm">
    @csrf
    @if($post)
        @method('PUT')
    @endif

    <!-- Basic Information -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8 space-y-6">
        <h3 class="text-lg font-semibold text-gray-800 border-b pb-4">Post Details</h3>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}" required
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                URL Slug
                <span class="text-gray-400 font-normal">(leave blank to auto-generate from the title)</span>
            </label>
            <div class="flex items-center gap-2">
                <span class="text-gray-400 text-sm whitespace-nowrap">/blog/</span>
                <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}"
                    placeholder="auto-generated-from-title"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                <select name="blog_category_id" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                    <option value="" disabled {{ old('blog_category_id', $post->blog_category_id ?? '') ? '' : 'selected' }}>
                        Select a category
                    </option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ (int) old('blog_category_id', $post->blog_category_id ?? 0) === $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @if($categories->isEmpty())
                    <p class="text-xs text-amber-600 mt-2">
                        No categories yet — <a href="{{ route('admin.blog.categories.index') }}" class="underline">create one first</a>.
                    </p>
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                <select name="status" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
                    <option value="draft" {{ old('status', $post->status ?? 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $post->status ?? '') === 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Publish Date
                <span class="text-gray-400 font-normal">(defaults to now if left blank and published)</span>
            </label>
            <input type="datetime-local" name="published_at"
                value="{{ old('published_at', optional($post->published_at ?? null)->format('Y-m-d\TH:i')) }}"
                class="w-full sm:w-64 px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
            <textarea name="excerpt" rows="2" maxlength="500"
                placeholder="Short summary shown on the blog listing page"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition resize-none">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        </div>
    </div>

    <!-- Featured Image -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8 space-y-4">
        <h3 class="text-lg font-semibold text-gray-800 border-b pb-4">Featured Image</h3>

        @if($post && $post->featured_image_url)
            <div>
                <p class="text-sm text-gray-500 mb-2">Current image</p>
                <img src="{{ $post->featured_image_url }}" alt="" class="h-40 rounded-lg object-cover border border-gray-200">
            </div>
        @endif

        <div>
            <input type="file" name="featured_image" accept="image/*"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            <p class="text-xs text-gray-500 mt-1">PNG, JPG or WEBP (max 5MB). {{ $post ? 'Leave empty to keep the current image.' : '' }}</p>
        </div>
    </div>

    <!-- Content -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8 space-y-4">
        <h3 class="text-lg font-semibold text-gray-800 border-b pb-4">Content <span class="text-red-500">*</span></h3>
        <div id="editor-container" style="min-height: 320px;">{!! old('content', $post->content ?? '') !!}</div>
        <textarea name="content" id="content" class="hidden" required></textarea>
    </div>

    <!-- SEO -->
    <details class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">
        <summary class="text-lg font-semibold text-gray-800 cursor-pointer select-none">SEO (optional)</summary>
        <div class="mt-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}" maxlength="255"
                    placeholder="Overrides the page title used by search engines"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                <textarea name="meta_description" rows="2" maxlength="500"
                    placeholder="Falls back to the excerpt if left blank"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition resize-none">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
            </div>
        </div>
    </details>

    <div class="flex flex-col sm:flex-row justify-end gap-3">
        <a href="{{ route('admin.blog.index') }}"
            class="inline-flex items-center justify-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors duration-200">
            Cancel
        </a>
        <button type="submit"
            class="inline-flex items-center justify-center px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm">
            {{ $post ? 'Update Post' : 'Save Post' }}
        </button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    const quill = new Quill('#editor-container', {
        theme: 'snow',
        placeholder: 'Write your post...',
        modules: {
            toolbar: [
                [{ header: [2, 3, 4, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link', 'image'],
                ['clean'],
            ],
        },
    });

    document.getElementById('blogPostForm').addEventListener('submit', function () {
        document.getElementById('content').value = quill.root.innerHTML;
    });
</script>
