<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartShow extends Component
{
    public  $totalPrice=0;

  
    public function incrementQuantity(int $cartinId)
    {
     
            $cartData = Cart::where('id', $cartinId)->where('user_id', auth()->user()->id)->first();
            if ($cartData) {
                if ( $cartData->productColors()->where('id', $cartData->product_color_id)->exists()) {
                    $productColor = $cartData->productColors()->where('id', $cartData->product_color_id)->first();
                    if ($productColor->quantity  > $cartData->quantity) {
                        $cartData->increment('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Quantity Updated Successfully',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }
                    else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Only '.$productColor->quantity .'Quantity Available',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }
                }
                else {
                    if ($cartData->product->quantity > $cartData->quantity) {
                        $cartData->increment('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Quantity Updated Successfully',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }
                    else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Only '.$cartData->product->quantity .'Quantity Available',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    }
                }
               
                  
            
            }
            else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Something Went Wrong !',
                    'type' => 'error',
                    'status' => 404
                ]);
            }
          
  
    }
    public function decrementQuantity(int $cartinId)
    {
        
        
        $cartData = Cart::where('id', $cartinId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ( $cartData->productColors()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColors()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity  > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated Successfully',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
                else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only '.$productColor->quantity .'Quantity Available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }
            else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated Successfully',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
                else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only '.$cartData->product->quantity .'Quantity Available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }
           
              
        
        }
        else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong !',
                'type' => 'error',
                'status' => 404
            ]);
        }
      
        
    }
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
  