<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Governorate;
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

        Client::create([
            'name' =>'Mohamed Atia',
            'email' =>'moatia49@client.com',
            'password' =>bcrypt('2480123m'),
        ]);

        Product::create([
            'name' => 'Chair',
            'price' => 60 ,
            'image' => 'product-1.png',
            'description' => 'Chair',
        ]);
        Product::create([
            'name' => 'Office',
            'price' => 1500 ,
            'image' => 'product-2.png',
            'description' => 'Office',
        ]);
        // Product::create([
        //     'name' => 'Laptop',
        //     'price' => 15000 ,
        //     'image' => 'product-3.png',
        //     'description' => 'Laptop',
        // ]);
        // Product::create([
        //     'name' => 'PS5',
        //     'price' => 20000 ,
        //     'image' => 'product-4.png',
        //     'description' => 'PS5',
        // ]);
        // Product::create([
        //     'name' => 'Desk-Drawer',
        //     'price' => 2000 ,
        //     'image' => 'product-5.png',
        //     'description' => 'Desk-Drawer',
        // ]);
        // Product::create([
        //     'name' => 'Table',
        //     'price' => 500 ,
        //     'image' => 'product-6.png',
        //     'description' => 'Table',
        // ]);
        // Product::create([
        //     'name' => 'Phone',
        //     'price' => 4000 ,
        //     'image' => 'product-7.png',
        //     'description' => 'Phone',
        // ]);
        // Product::create([
        //     'name' => 'Watch',
        //     'price' => 500 ,
        //     'image' => 'product-8.png',
        //     'description' => 'Watch',
        // ]);
        Governorate::create([
            'name' => 'Mansoura',
        ]);
        Governorate::create([
            'name' => 'Tanta',
        ]);
    }
}
