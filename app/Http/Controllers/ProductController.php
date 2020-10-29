<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Site/Products', [
            'products' => Product::all()->map(function ($product) {
                return [
                    'id' => $product->id,
                    'title' => $product->title,
                    'price' => $product->price,
                    'url' => URL::route('product', $product->id),
                    'img' => asset(Storage::url('images/file.png')),
                    // 'img' => asset(),
                ];
            }),
            // 'create_url' => URL::route('users.create'),
        ]);
    }

    public function showOne($id)
    {
        return Inertia::render('Site/Product', ['product' => Product::find($id)]);
    }
}
