@extends('dashboard.base')

@section('title', 'Blog Categories')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
    <div class="mb-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Blog Categories</h1>
                <p class="mt-1 sm:mt-2 text-sm text-gray-600">Organize your blog posts into categories</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.blog.index') }}"
                    class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                    Back to Posts
                </a>
                <button onclick="openCreateModal()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                    + Add Category
                </button>
            </div>
        </div>
    </div>

    @include('feedback')

    @if($categories->count() > 0)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Posts</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-gray-600 max-w-sm truncate">{{ $category->description ?: '—' }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $category->posts_count }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button type="button"
                                        onclick='openEditModal(@json($category))'
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.blog.categories.destroy', $category->slug) }}" method="POST"
                                        onsubmit="return confirm('Delete category &quot;{{ addslashes($category->name) }}&quot;?');">
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
    @else
        <div class="text-center py-12 bg-white rounded-xl shadow-sm border border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 mb-2">No categories yet</h3>
            <p class="text-gray-500 mb-6">Create your first category to start organizing posts.</p>
            <button onclick="openCreateModal()"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                Add First Category
            </button>
        </div>
    @endif
</div>

<!-- Create / Edit Modal -->
<div id="categoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 id="categoryModalTitle" class="text-xl font-semibold text-gray-900">Add Category</h3>
                <button onclick="closeCategoryModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="categoryForm" method="POST">
                @csrf
                <div id="categoryMethodField"></div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="category_name" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="category_description" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeCategoryModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 font-medium">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const categoryStoreUrl = "{{ route('admin.blog.categories.store') }}";

    function openCreateModal() {
        document.getElementById('categoryModalTitle').textContent = 'Add Category';
        document.getElementById('categoryForm').action = categoryStoreUrl;
        document.getElementById('categoryMethodField').innerHTML = '';
        document.getElementById('category_name').value = '';
        document.getElementById('category_description').value = '';
        document.getElementById('categoryModal').classList.remove('hidden');
        document.getElementById('categoryModal').classList.add('flex');
    }

    function openEditModal(category) {
        document.getElementById('categoryModalTitle').textContent = 'Edit Category';
        document.getElementById('categoryForm').action = `/admin/blog-categories/${category.slug}`;
        document.getElementById('categoryMethodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('category_name').value = category.name;
        document.getElementById('category_description').value = category.description || '';
        document.getElementById('categoryModal').classList.remove('hidden');
        document.getElementById('categoryModal').classList.add('flex');
    }

    function closeCategoryModal() {
        document.getElementById('categoryModal').classList.add('hidden');
        document.getElementById('categoryModal').classList.remove('flex');
    }

    document.addEventListener('click', function(event) {
        const modal = document.getElementById('categoryModal');
        if (event.target === modal) {
            closeCategoryModal();
        }
    });
</script>
@endsection
