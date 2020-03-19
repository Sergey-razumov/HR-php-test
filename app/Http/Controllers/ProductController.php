<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::orderBy('name')->paginate(25);

        return view('product.list', compact('products'));
    }

    public function updatePrice(int $id, int $price)
    {
        $product = Product::findOrFail($id);

        $product->price = $price;
        $product->save();

        return new JsonResponse([], 200);
    }
}
