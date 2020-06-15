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
        	['name' => 'Trà'],
        	['name' => 'Trà Sữa'],
        	['name' => 'FRESH FRUIT TEA'],
        	['name' => 'Cà Phê'],
        	['name' => 'Soda'],
        	['name' => 'Soft Drinks'],
        	['name' => 'Pizza'],
        	['name' => 'Burger'],
        	['name' => 'Đồ Ăn Vặt']
        ]);
    }
}
