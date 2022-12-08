<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartShow extends Component
{
    public function removeCartItem(int $cartId)
    {
       Cart::where('user_id',auth()->user()->id)->where('id', $cartId)->delete();
       $this->emit('cartAddedUpdated');
       $this->dispatchBrowserEvent('message', [
        'text' => 'Cart Item removed successfully ',
        'type' => 'success',
        'status' => 200
    ]);
    }
    public function render()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'carts' => $carts
        ]);
    }
}
  