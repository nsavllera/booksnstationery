<x-app-layout>
    @push('head')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Simply Stationery !') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Hero Section -->
            <div class="rounded-lg h-96 flex items-center shadow  overflow-hidden">
                <img src="/images/webdevheader.jpg" alt="" width="fix-content">
            </div>


            <!-- Categories Section -->
            <div class ="mt-8">
                <h3 class="text-xl font-semibold text-gray-800">Category</h3>
                <div class="grid grid-cols-2 md:grid-cols-2 gap-6 mt-4">
                    <div class="bg-white shadow rounded-lg p-4 text-center">
                        <img src="/images/books.jpeg" alt="" class="w-full h-32 object-cover rounded-lg">
                        <h4 class="mt-2 text-gray-700 font-medium">Books</h4>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4 text-center">
                        <img src="/images/stationery.jpeg" alt="" class="w-full h-32 object-cover rounded-lg">
                        <h4 class="mt-2 text-gray-700 font-medium">Stationery</h4>
                    </div>
                </div>
            </div>

            <!-- Featured Products Section-->
            <div>
                <h3 class="text-xl font-semibold text-gray-800">Featured Products</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="/" class="w-full h-40 object-cover rounded-lg">
                        <h4 class="mt-2 text-gray-700 font-medium">Name</h4>
                        <p class="text-gray-500">Price</p>
                        <a href="/" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            View Details
                        </a>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="/" class="w-full h-40 object-cover rounded-lg">
                        <h4 class="mt-2 text-gray-700 font-medium">Name</h4>
                        <p class="text-gray-500">Price</p>
                        <a href="/" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            View Details
                        </a>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="/" class="w-full h-40 object-cover rounded-lg">
                        <h4 class="mt-2 text-gray-700 font-medium">Name</h4>
                        <p class="text-gray-500">Price</p>
                        <a href="/" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            View Details
                        </a>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4">
                        <img src="/" class="w-full h-40 object-cover rounded-lg">
                        <h4 class="mt-2 text-gray-700 font-medium">Name</h4>
                        <p class="text-gray-500">Price</p>
                        <a href="/" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            View Details
                        </a>
                    </div>
                </div>
            </div> 
            
            <!-- Promotions Section -->
            <div class="bg-blue-200 shadow rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-lime-900">Special Offer!</h3>
                <p class="mt-2">Get 20% off on your first purchase. Use code: WELCOME20</p>
                <a href="{{Route('product.customerIndex')}}" class="mt-4 inline-block bg-lime-800 text-white px-6 py-3 rounded-lg hover:bg-green-200">
                    Shop Now
                </a>
            </div>
        </div>
    </div>
</x-app-layout>