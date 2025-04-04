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
            ['name' => 'Appetizer'],
            ['name' => 'Main Course'],
            ['name'=> 'Snack'],
            ['name'=> 'Dessert'],
            ['name'=> 'Coffee'],
            ['name'=> 'Non Coffee'],
            ['name'=> 'Healthy Juice'],
        ]);
    }
}
