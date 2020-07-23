<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	//Loại sản phẩm
            ['name' => 'Trà',
            'image' => 'tra.jpg',
            'category_type' => 1],
        	['name' => 'Trà Sữa',
            'image' => 'tra-sua.jpg',
            'category_type' => 1],
        	['name' => 'FRESH FRUIT TEA',
            'image' => 'fresh-fruit-tea.jpg',
            'category_type' => 1],
            ['name' => 'Cà Phê',
            'image' => 'cafe.jpg',
            'category_type' => 1],
            ['name' => 'Soda',
            'image' => 'soda.jpg',
            'category_type' => 1],
            ['name' => 'Soft Drinks',
            'image' => 'soft-drink.jpg',
            'category_type' => 1],
            ['name' => 'Pizza',
            'image' => 'pizza.jpg',
            'category_type' => 2],
            ['name' => 'Burger',
            'image' => 'burger.jpg',
            'category_type' => 2],
            ['name' => 'Đồ Ăn Vặt',
            'image' => 'do-an-vat.jpg',
            'category_type' => 2]
        ]);
    }
}
