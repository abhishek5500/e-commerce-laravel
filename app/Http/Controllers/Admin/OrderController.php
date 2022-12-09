<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // $todayDate = Carbon::now()->format('Y-m-d');
        // $orders = Order::orderBy('created_at', 'DESC')->whereDate('created_at', $todayDate)->paginate(10);


        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != NULL , function ($q) use ($request){
            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todayDate)
        {
            return $q->whereDate('created_at', $todayDate);
        })
        ->when($request->status != NULL , function ($q) use ($request){
            return $q->where('status_message', $request->status);
        })
        ->paginate(10);

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
