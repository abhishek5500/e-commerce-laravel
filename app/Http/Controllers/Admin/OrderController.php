<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Mail\InvoiceOrderMailable;

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
            return $q->latest();
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
         
            return redirect()->back();
        }
    }
    public function updateOrderStatus(int $orderId ,Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
        
            return redirect()->back()->with('message', 'Order Status Updated');
        }
        else {
        
            return redirect()->back()->with('message', 'Order Id Not Found');
        }
        
    }

    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.viewinvoice', compact('order'));
    }
    public function generateInvoice(int $orderId)
    {
        $todayDate = Carbon::now()->format('d-m-y');
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.viewinvoice', $data);
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
        
    }
    public function mailInvoice(int $orderId)
    {
      try {
        $order = Order::findOrFail($orderId);
        Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
        return redirect('admin/orders/'.$orderId)->with('message', 'Invoice sent to mail '.$order->email.'Successfiylly');
      } catch (\Throwable $th) {
        return redirect('admin/orders/'.$orderId)->with('message', 'Invoice not sent');
      }
        
       
        
    }
}
