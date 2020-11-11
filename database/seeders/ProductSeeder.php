<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => $this->faker->firstName,
            'description' => $this->faker->text($maxNbChars = 200),
            'price' => $this->faker->numerify('##'),
            'image' => 'storage/images/file.png',
            'url' => '/#/product/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
