<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return Category::orderBy('created_at', 'desc')->get();
    }

    /**
     * @param $id
     * @return array
     */
    public function showOne($id): array
    {
        $category = Category::findOrFail($id);

        return [
            "category" => $category,
            "products" => $category->products,
        ];
    }
}
