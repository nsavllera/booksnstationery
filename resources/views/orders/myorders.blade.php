<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-gray-800">My Orders</h1>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        @if(count($orders) > 0)
            @foreach ($orders as $order)
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold">Order #{{ $order->id }}</h2>
                    <p class="text-gray-800">Status: {{ $order->status }}</p>
                    <p class="text-gray-800">Total: RM {{ $order->total }}</p>
                    <p class="text-gray-800">Address: {{ $order->address }}</p>

                    <h3 class="mt-4 text-xl">Items:</h3>
                    <table class="table-auto w-full text-left mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Product</th>
                                <th class="px-4 py-2">Quantity</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td class="px-4 py-2">{{ $item->product->name }}</td>
                                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                                    <td class="px-4 py-2">RM {{ $item->price }}</td>
                                    <td class="px-4 py-2">RM {{ $item->subtotal }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        @else
            <p class="text-gray-800">You have no orders yet.</p>
        @endif
    </div>
</x-app-layout>
