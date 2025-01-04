<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Checkout
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded-md mb-6">{{ session('success') }}</div>
            @endif

            @if(count($cartItems)>0)
                <form action="{{ route('order.place') }}" method="POST">
                    @csrf
                    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                        <table class="w-full table-auto text-left">
                            <thead class="bg-blue-500 text-black">
                                <tr>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Quantity</th>
                                    <th class="px-4 py-2">Price</th>
                                    <th class="px-4 py-2">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="text-center px-4 py-2">{{ $item->product->name }}</td>
                                        <td class="text-center px-4 py-2">{{ $item->quantity }}</td>
                                        <td class="text-center px-4 py-2">{{ $item->product->price }}</td>
                                        <td class="text-center px-4 py-2">{{ $item->subtotal_price }}</td>
                                        <input type="hidden" name="items[]" value="{{ $item->id }}">
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 text-lg font-semibold">
                        <p>Total Price: RM <span>{{ $totalPrice }}</span></p>
                    </div>

                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                    <div class="mt-4">
                        <label for="address" class="block font-medium text-gray-700">Address</label>
                        <input id="address" type="text" name="address" class="w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <button type="submit" class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Proceed</button>
                </form>
            @else
                <p class="mt-6 text-gray-600">No items selected for checkout.</p>
            @endif
        </div>
    </div>
</x-app-layout>