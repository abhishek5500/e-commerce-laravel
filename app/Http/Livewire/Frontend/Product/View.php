<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $product, $category, $productColorSelectedQuantity;
  
    public function colorSelected($productColorId)
    {
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;
        if ($this->productColorSelectedQuantity == 0) {
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
