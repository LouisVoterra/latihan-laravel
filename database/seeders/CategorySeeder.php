<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            ['name' => 'Appetizer', 'image' => 'Appetizer.jpg'],
            ['name' => 'Main Course', 'image' => 'maincourse.jpg'],
            ['name'=> 'Snack', 'image' => 'Snack.jpg'],
            ['name'=> 'Dessert',  'image' => 'Dessert.jpg'],
            ['name'=> 'Coffee', 'image' => 'coffee.jpg' ],
            ['name'=> 'Non Coffee', 'image' => 'noncoffee.jpg'],
            ['name'=> 'Healthy Juice', 'image' => 'healthyjuice.jpg'],
        ]);
    }
}
