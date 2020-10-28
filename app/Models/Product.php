<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    public function categories()
    {
        // Find better way!!!
        return $this->belongsToMany(
            Category::class,
            'category_product',
            'product_id',
            'category_id'
        )->withTimestamps();
    }

    public static function getProducts()
    {
        return Product::all();
    }

    public static function getProduct($id)
    {
        return Product::find($id);
    }

    public static function getSpecificProduct($id)
    {
        // Find better way!!!
        return \DB::table('products AS p')
            ->join('category_product', 'category_id', '=', 'p.id')
            ->select('p.id', 'p.title', 'p.description', 'p.price')
            ->where('category_product.product_id', $id)
            ->get();
    }
}
