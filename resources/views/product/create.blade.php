<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">Add New Product</h1>
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                        <input type="text" id="name" name="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                        <input type="text" id="price" name="price" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category:</label>
                        <select id="category_id" name="category_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
                        <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="gap-6 py-3 flex items-center space-x-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add
                        </button>
                        <a href="{{ route('product.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
