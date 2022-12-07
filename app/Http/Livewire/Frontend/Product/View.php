<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class View extends Component
{
    public $product, $category, $productColorSelectedQuantity;
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
                
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist added successfully ):',
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
    public function colorSelected($productColorId)
    {
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;
        if($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = "outofstock";
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
