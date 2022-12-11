<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
   public function index()
   {
      $todayDate = Carbon::now()->format('Y-m-d');
      $thismonth = Carbon::now()->format('m');
      $thisyear = Carbon::now()->format('Y');



      $orders = Order::all();

      $todayorders = Order::whereDate('created_at', $todayDate)->get();
      $monthorders = Order::whereMonth('created_at', $thismonth)->get();
      $yearorders = Order::whereYear('created_at', $thisyear)->get();

      $products = Product::all();
      $category = Category::all();
      $brands = Brand::all();

      $allusers = User::all();
      $customers = User::where('role_as', '0')->get();
      $alladmins = User::where('role_as', '1')->get();


    return view('admin.dashboard', compact('orders', 'todayorders', 'monthorders','yearorders', 'products', 'category', 'brands', 'allusers','customers', 'alladmins'));
   }
}
