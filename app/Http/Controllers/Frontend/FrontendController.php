<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('frontend.index',compact('sliders'));
    }
}
