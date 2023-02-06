<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("genders")->insert([
            "gender_desc" => "Male"
        ]);

        DB::table("genders")->insert([
            "gender_desc" => "Female"
        ]);
    }
}
