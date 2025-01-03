<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Support\Facades\Auth;

class CartItemsController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user_id = Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => $user_id]);

        $cartItem = CartItems::where('cart_id', $cart->id)->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->subtotal_price = $cartItem->quantity * $product->price;
            $cartItem->save();
        } else {
            CartItems::create([
                'cart_id' => $cart->id,
                'product_id' => $id,
                'quantity' => 1,
                'subtotal_price' => $product->price,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function remove(Request $request, $id)
    {
        $user_id = Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => $user_id]);
        $cartItem = CartItems::where('cart_id', $cart->id)->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => $user_id]);
        $cartItem = CartItems::where('cart_id', $cart->id)->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->subtotal_price = $cartItem->quantity * $cartItem->product->price;
            $cartItem->save();
        }

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $product = CartItems::findOrFail($id);
        $product->delete();

        return redirect()->route('cart.index')->with('success', 'Cart item deleted successfully.');
    }
}
