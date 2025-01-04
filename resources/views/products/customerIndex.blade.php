<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Shop Here
        </h2>
    </x-slot>

    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg h-96 flex items-center overflow-hidden">
                <img src="/images/webdevheader.jpg" alt="" width="fix-content">
            </div>

        <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">Products</h1>

                <h2 class="text-xl font-semibold mb-4">Books</h2>

                <div>
                    <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
                        @foreach ($books as $product)
                        <div class="bg-white shadow rounded-lg p-4">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded-lg">
                            <a href="{{route('product.show', $product->id)}}" class="mt-2 text-blue-900 font-medium">{{ $product->name }}</a>
                            <p class="text-gray-900">RM {{ number_format($product->price, 2) }}</p>
                            <!-- Add to Cart Form -->
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>

                <h2 class="text-xl font-semibold mb-4">Stationery</h2>
                <div>
                    <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
                        @foreach ($stationeries as $product)
                        <div class="bg-white shadow rounded-lg p-4">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded-lg">
                            <a href="{{route('product.show', $product->id)}}" class="mt-2 text-blue-900 font-medium">{{ $product->name }}</a>
                            <p class="text-gray-900">RM {{ number_format($product->price, 2) }}</p>
                            <!-- Add to Cart Form -->
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
