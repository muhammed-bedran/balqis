<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' =>'muhammed',
            'email'=>'muhammed@gmail.com',
            'password'=> Hash::make('muhammed1234'),
        ]);
        User::create([
            'name' => 'mazen',
            'email' => 'mazen@gmail.com',
            'password' => Hash::make('mazen1234'),
        ]);
    }
}
