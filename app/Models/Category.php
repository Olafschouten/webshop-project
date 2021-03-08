<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        // Find better way!!!
        return $this->belongsToMany(
            Product::class,
            'category_products',
            'category_id',
            'product_id'
        )->withTimestamps();
    }

    /**
     * @return Category[]|Collection
     */
    public static function getCategories()
    {
        return Category::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getCategory($id)
    {
        return Category::find($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getSpecificCategories($id)
    {
        // Find better way!!!
        return \DB::table('categories AS c')
            ->join('category_products', 'category_id', '=', 'c.id')
            ->select('c.id', 'c.title')
            ->where('category_products.product_id', $id)
            ->get();
    }
}
