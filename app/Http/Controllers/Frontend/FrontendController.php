<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $trendingProducts = Product::where('trending', '1')->latest()->take(16)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(2)->get();
        $newProductsArrival = Product::latest()->take(16)->get();
        return view('frontend.index',compact('sliders', 'trendingProducts', 'featuredProducts', 'newProductsArrival'));
    }
    public function categories()
    {
        $categories = Category::all();
        return view('frontend.category.index',compact('categories'));
    }
    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
           
            return view('frontend.product.index',compact('category'));
        }
        else {
            return redirect()->back();
        }
      
    }
    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if($product) {
                
                return view('frontend.product.view',compact('product','category'));
            }
        }
        else {
            return redirect()->back();
        }
    }
    public function thankYou()
    {
        return view('frontend.thank.index');
    }
    public function newArrival()
    {
        $newProductsArrival = Product::latest()->take(16)->get();
        return view('frontend.pages.new-arrival',compact('newProductsArrival'));
    }
    public function featuredProd()
    {
        $featuredProducts = Product::where('featured', '1')->latest()->take(2)->get();
        return view('frontend.pages.featured-prod',compact('featuredProducts'));
    }

    public function searchProducts(Request $request)
    {
       if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE','%'.$request->search.'%')->latest()->paginate(10);
            return view('frontend.pages.search-prod', compact('searchProducts'));
        
       }
       else {
        
        return redirect()->back();
       }
    }
}
