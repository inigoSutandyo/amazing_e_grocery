<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 7 data
        DB::table("items")->insert([
            "item_name" => "Good Vegie",
            "item_desc" => fake()->text(499),
            "price" => fake()->numberBetween(10000,300000),
            "image_url" => "images/items/brocoli.jpg",
        ]);
        DB::table("items")->insert([
            "item_name" => "Orange Fruit",
            "item_desc" => fake()->text(499),
            "price" => fake()->numberBetween(10000,300000),
            "image_url" => "images/items/orange.jpg"
        ]);
        DB::table("items")->insert([
            "item_name" => "Blue Jacket",
            "item_desc" => fake()->text(499),
            "price" => fake()->numberBetween(10000,300000),
            "image_url" => "images/items/blue_jacket.jpg"
        ]);
        DB::table("items")->insert([
            "item_name" => "Super Vegie",
            "item_desc" => fake()->text(499),
            "price" => fake()->numberBetween(10000,300000),
            "image_url" => "images/items/carrot.jpg",
        ]);
        DB::table("items")->insert([
            "item_name" => "Sweet LemOn",
            "item_desc" => fake()->text(499),
            "price" => fake()->numberBetween(10000,300000),
            "image_url" => "images/items/orange.jpg",
        ]);
        DB::table("items")->insert([
            "item_name" => "Vegie Ta",
            "item_desc" => fake()->text(499),
            "price" => fake()->numberBetween(10000,300000),
            "image_url" => "images/items/brocoli.jpg",
        ]);
        DB::table("items")->insert([
            "item_name" => "Ka Carrot",
            "item_desc" => fake()->text(499),
            "price" => fake()->numberBetween(10000,300000),
            "image_url" => "images/items/carrot.jpg",
        ]);

        for ($i=0; $i < 10; $i++) {
            DB::table("items")->insert([
                "item_name" => "Dummy " . ($i+8),
                "item_desc" => fake()->text(499),
                "price" => fake()->numberBetween(10000,300000),
                "image_url" => "images/items/brocoli.jpg",
            ]);
        }
    }
}
