<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => $user_id]);
        $cartItems = $cart->items;

        return view('cart.index', compact('cartItems'));
    }

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

    public function clear()
    {
        $user_id = Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => $user_id]);
        $cart->items()->delete();

        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
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



    public function checkout(Request $request) 
    { 
        $selectedItems = $request->input('selected_items', []); 
        $cartItems = CartItems::whereIn('id', $selectedItems)->get(); 
        return view('checkout.index', compact('cartItems')); 
    }
}
