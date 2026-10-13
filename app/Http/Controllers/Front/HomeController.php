<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

    $products = Product::query()
    ->with('category','store')
    ->latest()
    ->get();

    $categories = Category::query()
    ->where('status','active')
    ->get();

     return view('front.pages.index',[
         'products' => $products,
         'categories' => $categories
     ]);
    }
}
