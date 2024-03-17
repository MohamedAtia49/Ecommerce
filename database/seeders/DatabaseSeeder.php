<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' =>'Mohamed Atia',
            'email' =>'atia@admin.com',
            'password' =>bcrypt('2480123m'),
        ]);

        Product::create([
            'name' => 'Chair' ,
            'price' => 99.9 ,
            'image' => 'chair.jpeg',
            'description' => 'Wood Chair',
        ]);
        Product::create([
            'name' => 'Office' ,
            'price' => 99.9 ,
            'image' => 'office.jpeg',
            'description' => 'Wood Office',
        ]);
    }
}
