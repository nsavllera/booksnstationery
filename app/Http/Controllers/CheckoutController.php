<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItems;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $selectedItems = $request->input('selected_items', []);
        $totalPrice = $request->input('total_price', 0);

        if(count($selectedItems) > 0) {
            $cartItems = CartItems::whereIn('id', $selectedItems)->get();
        } else {
            $cartItems = collect();
        }

        return view('checkout.index', compact('cartItems', 'totalPrice'));
    }

}