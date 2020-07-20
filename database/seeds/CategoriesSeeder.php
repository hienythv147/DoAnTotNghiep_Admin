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
        	['name' => 'Trà','category_type' => 1],
        	['name' => 'Trà Sữa','category_type' => 1],
        	['name' => 'FRESH FRUIT TEA','category_type' => 1],
        	['name' => 'Cà Phê','category_type' => 1],
        	['name' => 'Soda','category_type' => 1],
        	['name' => 'Soft Drinks','category_type' => 1],
        	['name' => 'Pizza','category_type' => 2],
        	['name' => 'Burger','category_type' => 2],
        	['name' => 'Đồ Ăn Vặt','category_type' => 2]
        ]);
    }
}
