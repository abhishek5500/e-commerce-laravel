<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('frontend.index',compact('sliders'));
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
            // $products = $category->products()->get();
            return view('frontend.product.index',compact('category'));
        }
        else {
            return redirect()->back();
        }
        return view('frontend.category.index',compact('category'));
    }
}
