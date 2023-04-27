<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
 
    public function show(Product $product)
    {
      
        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $product
        ],201);
        
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json([
            'success' => true
        ],200);

        // return response()->json($product, 200);

    }

    public function delete(Product $product)
    {
        $product->delete();

        return response()->json([
            'success' => true
        ], 204);
    }
}
