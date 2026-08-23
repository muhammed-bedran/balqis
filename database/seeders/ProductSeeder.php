<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            [
                'name' => 'كهرباء',
                'description' => 'كهرباء',
                'price' => 100,
                'status' => 'active',
                'store_id' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'موبايل',
                'description' => 'موبايل',
                'price' => 100,
                'status' => 'active',
                'store_id' => 1,
                'category_id' => 2
            ],
            [
                'name' => 'كمبيوتر',
                'description' => 'كمبيوتر',
                'price' => 100,
                'status' => 'active',
                'store_id' => 1,
                'category_id' => 3
            ],
        ];
        foreach($products as $product){
            Product::create($product);
        }
    }
}
