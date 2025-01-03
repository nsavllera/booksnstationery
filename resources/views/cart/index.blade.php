<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Shopping Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Shopping Cart</h1>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded-md mb-6">{{ session('success') }}</div>
            @endif

            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="w-full table-auto text-left">
                    <thead class="bg-blue-500 text-black">
                        <tr>
                            <th class="px-4 py-2">Select</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <!-- Checkbox for Selection -->
                                <td class="px-4 py-2">
                                    <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="item-checkbox" data-price="{{ $item->product->price }}" data-quantity="{{ $item->quantity }}" id="checkbox-{{ $item->id }}" onclick="updateTotal()">
                                </td>
                                <!-- Product Details -->
                                <td class="text-center px-4 py-2">{{ $item->product->name }}</td>
                                <td class="text-center px-4 py-2">
                                    <button type="button" onclick="changeQuantity('{{ $item->id }}', 'decrease')" class="bg-gray-300 text-gray-800 px-2 py-1 rounded-md">-</button>
                                    <input type="number" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" min="1" class="w-16 text-center border border-gray-300 rounded-md">
                                    <button type="button" onclick="changeQuantity('{{ $item->id }}', 'increase')" class="bg-gray-300 text-gray-800 px-2 py-1 rounded-md">+</button>
                                </td>
                                <td class="text-center px-4 py-2">${{ $item->product->price * $item->quantity }}</td>
                                <!-- Remove Button -->
                                <td class="text-center px-4 py-2">
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Checkout Button -->
            <div class="mt-6 flex justify-between items-center">
                <div class="text-lg font-semibold">
                    Total: <span id="total-amount">$0.00</span>
                </div>
                <div>
                    <form action="{{ route('checkout.index') }}" method="GET">
                        <input type="hidden" id="checkout-selected-items" name="selected_items">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md">Proceed to Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function updateTotal() {
                let total = 0;
                let selectedItems = [];
                document.querySelectorAll('.item-checkbox').forEach(function (checkbox) {
                    if (checkbox.checked) {
                        total += parseFloat(checkbox.dataset.price) * parseInt(checkbox.dataset.quantity);
                        selectedItems.push(checkbox.value);
                    }
                });
                document.getElementById('total-amount').innerText = `$${total.toFixed(2)}`;
                document.getElementById('checkout-selected-items').value = JSON.stringify(selectedItems);
            }

            function changeQuantity(id, action) {
                const quantityInput = document.getElementById('quantity-' + id);
                let quantity = parseInt(quantityInput.value);

                if (action === 'increase') {
                    quantity++;
                } else if (action === 'decrease' && quantity > 1) {
                    quantity--;
                }

                quantityInput.value = quantity;
                document.getElementById('checkbox-' + id).dataset.quantity = quantity;

                updateTotal();

                // Update the cart_items quantity on the server
                fetch(`/cart/update/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ quantity: quantity })
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Quantity updated successfully');
                    } else {
                        console.error('Failed to update quantity');
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
