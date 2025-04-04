<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("foods")->insert([
            [
                'name' => 'Nasi Merah dengan Ayam Panggang Kecap & Tumis Kangkung',
                'nutrition_fact' =>'Kalori: 440-550 kkal
                                    Protein: 30 - 40 gram
                                    Lemak: 15 - 25 gram
                                    Karbohidrat: 50 - 70 gram
                                    Serat: 5 - 8 gram',
                'description'=>'Nikmati hidangan sehat dan lezat dengan nasi merah yang kaya serat, dipadukan dengan ayam panggang',
                'price'=>35000,
                'category_id' => 2
            ],
            [
                'name' => 'Nasi Hitam dan tumis Ca Kailan',
                'nutrition_fact' =>'Kalori: 440-550 kkal
                                    Protein: 30 - 40 gram
                                    Lemak: 15 - 25 gram
                                    Karbohidrat: 50 - 70 gram
                                    Serat: 5 - 8 gram',
                'description'=>'Nikmati hidangan sehat dan lezat dengan nasi hitam yang kaya serat.',
                'price'=>30000,
                'category_id'=> 2
            ]
        ]
        );
    }
}
