<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
                <p class="mt-4">{{ $product->description }}</p>
                <p class="mt-2 font-semibold">Price: RM {{ $product->price }}</p>
                @if ($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="mt-4 w-72">
                @else
                    <p class="mt-4 text-gray-500">No image</p>
                @endif
                <p class="mt-4">Category: {{ $product->category->name }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add to Cart
                    </button>
                </form>
                <a href="{{ route('product.customerIndex') }}" class="mt-4 inline-block text-blue-600 hover:underline">
                    Back to Products
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
