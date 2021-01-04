<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::orderBy('created_at', 'desc')->get();
    }

    public function showOne($id)
    {
        $category = Category::findOrFail($id);

        return [
            "category" => $category,
            // "products" => $category->products
        ];
    }
}
