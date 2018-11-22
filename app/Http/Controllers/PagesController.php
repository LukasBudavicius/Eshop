<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;

class PagesController extends Controller
{
    public function index(){
      return view('Pages.index');
    }

    public function showAdmin(){
      $user = User::count();
      $totalRevenue = Order::sum('total');
      $orders = Order::count();
      $product = Product::all();
      return view('adminPanel.index', ['user' => $user, 'totalRevenue' => $totalRevenue, 'orders' => $orders, 'product' => $product]);
    }
}
