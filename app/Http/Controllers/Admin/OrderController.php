<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display all the orders
     */
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index')->with([
            'orders' => $orders
        ]);
    }

    /**
     * Delete order
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with([
            'success' => 'Order has been deleted successfully'
        ]);
    }
}
