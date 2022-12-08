<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;

class View extends Component
{
    public $product, $category, $productColorSelectedQuantity, $quantityCount=1, $productColorId;
    public function addToWishlist($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added !',
                    'type' => 'info',
                    'status' => 409
                ]);
                return false;
            }
            else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to Wishlist successfully ):',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else {
           
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login First !',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function addToCart($productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->exists()) {
                // color check 
                if ($this->product->productColors()->count() > 1) {
                    if($this->productColorSelectedQuantity != NULL) {
                        if (Cart::where('user_id', auth()->user()->id)
                        ->where('product_id', $productId)
                        ->where('product_color_id', $this->productColorId)
                        ->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Already added !',
                                'type' => 'info',
                                'status' => 409
                            ]);
                            return false;
                        }
                       else {
                        $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                        if ($productColor->quantity > 0) {
                            if ($productColor->quantity >= $this->quantityCount) {
                                $cart = Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'product_color_id' => $this->productColorId,
                                    'quantity' => $this->quantityCount,
                                ]);
                                $this->emit('cartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Added to Cart successfully ):',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$productColor->quantity .' Quantity Available !',
                                    'type' => 'info',
                                    'status' => 409
                                ]);
                            }
                        }
                        else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock for color',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                       }
                    }
                    else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your Product Color',
                            'type' => 'info',
                            'status' => 409
                        ]);
                    }
                }
                else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Already added !',
                            'type' => 'info',
                            'status' => 409
                        ]);
                        return false;
                    }
                    else {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity >= $this->quantityCount) {
                                $cart = Cart::create([
                                    'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                 
                                        'quantity' => $this->quantityCount,
                                ]);
                                $this->emit('cartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Added to Cart successfully ):',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$this->product->quantity .' Quantity Available !',
                                    'type' => 'info',
                                    'status' => 409
                                ]);
                            }
                        }
                        else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock ',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
               
              
               
            }
            else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not exists',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else {
           
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login First !',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;
        if($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = "outofstock";
        }
    }
    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) { 
            $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
        
    }
    public function mount($category, $product)
    {
       
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view',[
            'product' => $this->product,
            'category' => $this->category,
        ]);
    }
}
