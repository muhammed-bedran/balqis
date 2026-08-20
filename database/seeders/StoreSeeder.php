<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;
class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Store::create([
            'name' => 'متجر الأمل',
            'description' => 'متجر الأمل',
            'status' => 'active',
        ]);
        Store::create([
            'name' => 'متجر الحياة',
            'description' => 'متجر الحياة',
            'status' => 'active',
        ]);
    }
}
