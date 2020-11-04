<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource as ProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(5);

        return ProductResource::collection($products);
    }

    public function showOne($id)
    {
        return Product::findOrFail($id);
    }
}
