<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Support\Str;
class CheckoutShow extends Component
{
    public $carts, $totalProductAmount=0;
    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|min:10|max:13',
            'pincode' => 'required|string|max:6',
            'address' => 'required|string|max:500'
        ];
    }
    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id ,
            'tracking_no' => 'ABHI'.Str::random(5),
            'full_name' => $this->fullname,
            'email' => $this->email,
            'phone' =>$this->phone ,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'In Progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);
        foreach ($this->carts as   $cartItems) {
            $orderitem = Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $cartItems->product_id,
                'product_color_id' => $cartItems->product_color_id,
                'quantity' => $cartItems->quantity,
                'price' =>$cartItems->product->selling_price 
              
            ]);
            if ($cartItems->product_color_id != NULL) {
                $cartItems->productColors()->where('id',$cartItems->product_color_id)->decrement('quantity', $cartItems->quantity);
            }
            else {
                $cartItems->product()->where('id',$cartItems->product_id)->decrement('quantity', $cartItems->quantity);
            }
        }
        return $order;
       
    }
    public function codOrder()
    {
        $this->payment_mode = 'COD';
        $codOrder = $this->placeOrder();
        if ($codOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->emit('cartAddedUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => ' Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        }
        else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong !',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }
    public function render()
    {
        
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalProductAmount = $this->totalProductAmount();

        return view('livewire.frontend.checkout.checkout-show',[
            'totalProductAmount' => $this->totalProductAmount 
        ]);
    }
}