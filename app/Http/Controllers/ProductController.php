<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\ProductResource as ProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);

        return ProductResource::collection($products);
    }

    public function showOne($id)
    {
        $product = Product::findOrFail($id);

        return [
            "product" => $product,
            "categories" => $product->categories,
        ];
    }

    //Cart functions
    public function getCart()
    {
        if (!Session::has('cart')) {
            return "no items in cart";
        }
        $cart = new Cart();
        return [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice
        ];
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = new Cart();
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return $cart->items;
    }

    public function reduceByOne($id)
    {
        $cart = new Cart();
        $cart->reduceOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return $cart->items;
    }

    public function removeItem($id)
    {
        $cart = new Cart();
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return $cart->items;
    }

    public function increaseByOne(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = new Cart();
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return $cart->items;
    }
}
