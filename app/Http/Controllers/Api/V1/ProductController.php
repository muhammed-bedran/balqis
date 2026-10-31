<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
      //Get  // http://127.0.0.1:8000/api/products 
        $products = Product::query()
        ->with(['category','store'])
        ->latest()
        ->get();
        return response()->json($products);
    }
    public function show(Product $product)
    {
        //Get  // http://127.0.0.1:8000/api/products/1
        $product->load(['category','store']);
        return response()->json($product);
    }
    // load('posts','comments');
    // load('posts.comments');
    public function validateProductData(Request $request,?Product $product = null)
    {
        $updating = $product !== null;
        $required = $updating ? 'sometimes' : 'required';
        return $request->validate([
            'name' => [
                $required,
                'string',
                'max:255',  
                Rule::unique('products','name')->ignore($product?->id),
            ],
            'description'=>['nullable','max:2000'],
            'price' =>[
                $required,
                'min:0'
            ],
            'store_id' =>[$required,'exists:stores,id'],
            'category_id' =>[$required,'exists:categories,id'],
            'status' =>[$required,'in:active,inactive'],
        ]);

    }
    public function store(Request $request)
    {
        //Post  // http://127.0.0.1:8000/api/products
        $data = $this->validateProductData($request);
        $product = new Product();
        $product->fill($data);
        $product->save();
        $product->load(['category','store']);
        return response()->json([
            'product' => $product,
            'message' => 'Product created successfully',
        ]);
    }
    public function destroy(Product $product)
    {
        //Delete  // http://127.0.0.1:8000/api/products/1
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully',
        ]);
    }
    public function update(Request $request,Product $product)
    {
        //Put  // http://127.0.0.1:8000/api/products/1
        $data = $this->validateProductData($request,$product);
        $product->update($data);
        $product->load(['category','store']);
        return response()->json([
            'product' => $product,
            'message' => 'Product updated successfully',
        ]);
    }

}
