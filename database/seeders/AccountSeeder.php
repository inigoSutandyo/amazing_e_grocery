<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 3 data
        DB::table("accounts")->insert([
            "first_name" => "Admin",
            "last_name" => "Maguire",
            "email" => "admin@admin.com",
            "password" => bcrypt("admin123"),
            "display_picture_link" => "images/accounts/default_avatar.jpg",
            "role_id" => 1,
            "gender_id" => 1,
        ]);
        DB::table("accounts")->insert([
            "first_name" => "John",
            "last_name" => "Modong",
            "email" => "john@gmail.com",
            "password" => bcrypt("modong123"),
            "display_picture_link" => "images/accounts/choncc.jpg",
            "role_id" => 2,
            "gender_id" => 2,
        ]);
        DB::table("accounts")->insert([
            "first_name" => "Harry",
            "last_name" => "Maguire",
            "email" => "harry@gmail.com",
            "password" => bcrypt("maguire123"),
            "display_picture_link" => "images/accounts/harry_maguire.jpg",
            "role_id" => 2,
            "gender_id" => 1,
        ]);
    }
}
