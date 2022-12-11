<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $trendingProducts = Product::where('trending', '1')->latest()->take(16)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(2)->get();
        $newProductsArrival = Product::latest()->take(16)->get();
        return view('frontend.index',compact('sliders', 'trendingProducts', 'featuredProducts', 'newProductsArrival'));
    }
}
