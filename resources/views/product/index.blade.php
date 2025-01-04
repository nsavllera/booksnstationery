<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4 flex justify-between items-center">
                    <h1 class="text-2xl font-bold">List of Products</h1>
                    <a href="{{ route('product.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Product
                    </a>
                </div>
                <table class="table-fixed">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="w-24 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="w-96 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="w-32 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price(RM)</th>
                            <th class="w-32 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="w-60 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="w-60 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($stationeries as $product)
                        <tr>
                            <td class="w-32 px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                            <td class="max-w-96 px-6 py-4 whitespace-nowrap truncate overflow-hidden text-ellipsis">{{ $product->description }}</td>
                            <td class="w-32 px-6 py-4 whitespace-nowrap">{{ $product->price }}</td>
                            <td class="w-32 px-6 py-4 whitespace-nowrap">{{ $product->category->name }}</td>
                            <td class="w-60 px-6 py-4 whitespace-nowrap">
                                @if ($product->image)
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="size-70">
                                @else
                                    <span class="text-gray-500">No image</span>
                                @endif
                            </td>
                            <td class="w-60 gap-6 px-6 py-3 whitespace-nowrap flex place-items-center space-x-4">
                                <a href="{{ route('product.edit', $product->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
