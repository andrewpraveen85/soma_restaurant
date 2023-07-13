<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('menu')->insert([
            'menu_name' => 'Rice',
            'menu_type' => 'main',
            'menu_price' => 100,
        ]);
        DB::table('menu')->insert([
            'menu_name' => 'Rotty',
            'menu_type' => 'main',
            'menu_price' => 20,
        ]);
        DB::table('menu')->insert([
            'menu_name' => 'Noodles',
            'menu_type' => 'main',
            'menu_price' => 150,
        ]);
        DB::table('menu')->insert([
            'menu_name' => 'Waddai',
            'menu_type' => 'side',
            'menu_price' => 45,
        ]);
        DB::table('menu')->insert([
            'menu_name' => 'Dhal Curry',
            'menu_type' => 'side',
            'menu_price' => 75,
        ]);
        DB::table('menu')->insert([
            'menu_name' => 'Fish Curry',
            'menu_type' => 'side',
            'menu_price' => 120,
        ]);
        DB::table('menu')->insert([
            'menu_name' => 'Watalappam',
            'menu_type' => 'dessert',
            'menu_price' => 40,
        ]);
        DB::table('menu')->insert([
            'menu_name' => 'Jelly',
            'menu_type' => 'dessert',
            'menu_price' => 20,
        ]);
        DB::table('menu')->insert([
            'menu_name' => 'Pudding',
            'menu_type' => 'dessert',
            'menu_price' => 25,
        ]);
    }
}
