<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'name' => 'كهربائيات',
            'description' => 'كهربائيات',
            'status' => 'active',
        ]);
        Category::create([
            'name' => 'موبايلات',
            'description' => 'موبايلات',
            'status' => 'active',
        ]);
        Category::create([
            'name' => 'كمبيوتر',
            'description' => 'كمبيوتر',
            'status' => 'active',
        ]);
    }
}
