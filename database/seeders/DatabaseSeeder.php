<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Product::create(['name' => 'TV', 'price' => 499.99, 'description' => 'Best TV']);
        Product::create(['name' => 'iPhone', 'price' => 999.99, 'description' => 'Best iPhone']);
        Product::create(['name' => 'Chromecast', 'price' => 39.99, 'description' => 'Best Chromecast']);
        Product::create(['name' => 'Glasses', 'price' => 79.99, 'description' => 'Best Glasses']);

        Comment::create(['product_id' => 1, 'content' => 'test']);
        Comment::create(['product_id' => 1, 'content' => 'test2']);
        Comment::create(['product_id' => 1, 'content' => 'test3']);
    }
}
