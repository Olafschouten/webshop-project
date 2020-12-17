<?php

namespace Database\Factories;

<<<<<<< HEAD
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ModelFactory extends Factory
=======
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryProductFactory extends Factory
>>>>>>> c41b3bce970c1576cc1cc06c53fa7e46dd047968
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $model = Model::class;
=======
    protected $model = CategoryProduct::class;
>>>>>>> c41b3bce970c1576cc1cc06c53fa7e46dd047968

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
<<<<<<< HEAD
            'title' => '1',
            'url' => '1',
=======
            'category_id' => Category::factory()->create()->id,
            'product_id' => Product::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
>>>>>>> c41b3bce970c1576cc1cc06c53fa7e46dd047968
        ];
    }
}
