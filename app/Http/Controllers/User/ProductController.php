<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $store = Auth::user()->store;
        $query = Product::query()->where('store_id', $store->id)->with('category');
        if($name = $request->query('name')){
            $query->where('name','like',"%$name%");
        }
        if($status = $request->query('status')){
            $query->where('status',$status);
        }
        $products = $query->latest()->paginate(10);
        return view('user.pages.product.index',[
            'products'=> $products,
        ]);
    }
    public function create()
    {
        $product = new Product();
        $categories = Category::where('status','active')->get();
        return view('user.pages.product.create',[
            'product' => $product,
            'categories' => $categories
        ]);
    }
    public function store(Request $request)
    {
        $store = Auth::user()->store;
        $data= $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,inactive',
        ]);
        $product = new Product();
        $product->fill([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'status' => $data['status'],
            'store_id' => $store->id,
        ]);
        $product->save();
        return redirect()->route('user.products.index')
            ->with('success', 'تمت الاضافة بنجاح.');
    }
    public function edit(Product $product)
    {
        $categories = Category::where('status','active')->get();
        return view('user.pages.product.edit',[
            'product' => $product,
            'categories' => $categories
        ]);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('user.products.index')
            ->with('success', 'تم الحذف بنجاح.');
    }
}
