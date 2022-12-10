<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.orders.index', compact('orders'));
    }
    public function show($orderId)
    {
        $order = Order::where('user_id', auth()->user()->id)->where('id', $orderId)->first();
        if ($order) {
            return view('frontend.orders.view', compact('order'));
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
    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('frontend.invoice.viewinvoice', compact('order'));
    }
    public function generateInvoice(int $orderId)
    {
        $todayDate = Carbon::now()->format('d-m-y');
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('frontend.invoice.viewinvoice', $data);
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
        
    }
}
