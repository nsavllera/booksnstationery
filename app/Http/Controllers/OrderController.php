<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItems;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // CUSTOMER
    public function place(Request $request)
    {
        $user_id = Auth::id();

        $selectedItemIds = $request->input('items', []);
        $cartItems = CartItems::whereIn('id', $selectedItemIds)->get(); 

        // Total price of selected items
        $totalPrice = $request->input('total_price', 0);
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->subtotal_price;
        }

        // Create order
        $order = Order::create([
            'user_id' => $user_id,
            'status' => 'preparing',
            'total' => $totalPrice, 
            'address' => $request->address,
        ]);

        // Increase/decrease quantity
        foreach ($cartItems as $cartItem) {
            // Create order_items for selected cart_items
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
                'subtotal' => $cartItem->subtotal_price,
            ]);

            $cartItem->delete();
            /*if ($cartItem->quantity > 0) {
                $cartItem->save();
            } else {
                $cartItem->delete();
            }*/
        }

        // Redirect to /myorders
        return redirect()->route('myorders')->with('success', 'Order placed successfully!');
    }

    public function myOrders()
    {
        $user_id = Auth::id();

        $orders = Order::where('user_id', $user_id)->with('items.product')->get();

        return view('orders.myorders', compact('orders'));
    }

    // ADMIN
    public function index(Request $request)
    {
        // Sort orders by status
        $status = $request->input('status');

        $orders = Order::with(['user', 'items.product'])
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->get();

        return view('orders.admin.index', compact('orders', 'status'));
    }

    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Order status updated successfully!');
    }

}
