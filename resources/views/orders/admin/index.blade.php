<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-gray-800">Manage Orders</h1>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.orders') }}" method="GET" class="mb-6">
            <label for="status" class="mr-4">Filter by Status:</label>
            <select id="status" name="status" onchange="this.form.submit()" class="border rounded-md p-2">
                <option value="">All</option>
                <option value="preparing" {{ $status == 'preparing' ? 'selected' : '' }}>Preparing</option>
                <option value="delivered" {{ $status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="canceled" {{ $status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            <noscript><button type="submit" class="btn btn-primary mt-2">Filter</button></noscript>
        </form>

        @if(count($orders) > 0)
            @foreach ($orders as $order)
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold">Order #{{ $order->id }}</h2>
                    <p class="text-gray-800">Username: {{ $order->user->name }}</p>
                    <p class="text-gray-800">User ID: {{ $order->user_id }}</p>
                    <p class="text-gray-800">Status: {{ $order->status }}</p>
                    <p class="text-gray-800">Total: RM {{ $order->total }}</p>
                    <p class="text-gray-800">Address: {{ $order->address }}</p>
                    <p class="text-gray-800">Created At: {{ $order->created_at->format('d-m-Y H:i') }}</p>

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

                    <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="mt-4 mb-4">
                        @csrf
                        <label for="status" class="mr-4">Change Status:</label>
                        <select id="status" name="status" class="border rounded-md p-2">
                            <option value="preparing" {{ $order->status == 'preparing' ? 'selected' : '' }}>Preparing</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md mt-2">Update Status</button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="text-gray-700">No orders available.</p>
        @endif
    </div>
</x-app-layout>
