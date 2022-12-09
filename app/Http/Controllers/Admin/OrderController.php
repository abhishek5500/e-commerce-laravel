<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
    public function show($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            return view('admin.orders.view', compact('order'));
        }
        else {
            $this->dispatchBrowserEvent('message', [
                'text' => ' Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->back();
        }
    }
}
