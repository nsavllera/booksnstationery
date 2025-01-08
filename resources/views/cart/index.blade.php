<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Shopping Cart
        </h2>
    </x-slot>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.item-checkbox').forEach(function (checkbox) {
                if (checkbox.checked) {
                    total += parseFloat(checkbox.dataset.price) * parseInt(checkbox.dataset.quantity);
                }
            });
            document.getElementById('total-price').innerText = total.toFixed(2);
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
            });
        }
    </script>

    <div class ="py-12">
        <div class ="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">      
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif
        
            <form action="{{ route('checkout.index') }}" method="GET">
                <table class="w-full table-auto text-left">
                    <tr>
                    <th></th>
                    <th class="text-left px-4 py-2">Name</th>
                    <th class="text-left px-4 py-2">Quantity</th>
                    <th class="text-left px-4 py-2">Price</th>
                    <th class="text-left px-4 py-2">Subtotal</th>
                    </tr>
                    @foreach ($cartItems as $item)
                    <tr>
                        <td class="w-10 px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="item-checkbox" data-price="{{ $item->product->price }}" data-quantity="{{ $item->quantity }}" id="checkbox-{{ $item->id }}" onclick="updateTotal()">
                        </td>
                        <td class="w-32 px-6 py-4 whitespace-nowrap">{{ $item->product->name }}</td>
                        <td class="w-32 px-6 py-4 whitespace-nowrap">
                            <button type="button" onclick="changeQuantity('{{ $item->id }}', 'decrease')">-</button>
                            <input type="number" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" min="1" readonly>
                            <button type="button" onclick="changeQuantity('{{ $item->id }}', 'increase')">+</button>
                        </td>
                        <td class="w-32 px-6 py-4 whitespace-nowrap">{{ $item->product->price }}</td>
                        <td class="w-32 px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('cart.destroy', $item->product_id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-900">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="flex justify-between items-center mt-6">
                    <h3 class="text-2xl">Total Price: RM <span id="total-price">0.00</span></h3>
                    <input type="hidden" name="total_price" id="total_price" value="0">
                    <div class="flex x-4">
                        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Checkout</button>
                        <form action="{{ route('cart.clear') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="mt-4 bg-grey-100 hover:bg-blue-700 text-grey py-2 px-6 rounded">Clear Cart</button>
                        </form>
                    </div>
                </div>
    
            </form>

            <a href="{{ route('product.customerIndex') }}" class="mt-4 text-blue-500 underline">Continue Shopping</a>
        </div>
    </div>

    <script>
        document.querySelector('form[action="{{ route('checkout.index') }}"]').addEventListener('submit', function (e) {
            document.getElementById('total_price').value = document.getElementById('total-price').innerText;
        });
    </script>
</x-app-layout>