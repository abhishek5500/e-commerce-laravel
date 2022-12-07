<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
class Index extends Component



{
    public $products, $category, $brandInputs = [], $priceInputs = [];
    protected $queryString = [
        'brandInputs' => ['except' => '' ,'as' => 'brand'],
        'priceInputs' => ['except' => '' ,'as' => 'price'],
    ];
    public function mount($category)
    {
       
        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
        ->when($this->brandInputs, function($qs){
            $qs->whereIn('brand', $this->brandInputs);
        })
        ->when($this->priceInputs, function($qs){
            $qs->when($this->priceInputs == 'high-to-low', function($qs2){
                $qs2->orderBy('selling_price', 'DESC');
            })->when($this->priceInputs == 'low-to-high', function($qs2){
                $qs2->orderBy('selling_price', 'ASC');
            });
        })
        ->where('status', '0')->get();
        return view('livewire.frontend.product.index',[
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
} 
