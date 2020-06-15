<?php

use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
        	//Nguyên liệu số 1
        	['name' => 'Đường Cát',
        	'ingredient_unit' => 'g',
        	'amount_stock' => 10000], //~10KG
        	//Nguyên liệu số 2
        	['name' => 'Hồng Trà',
        	'ingredient_unit' => 'Gói',
        	'amount_stock' => 70],
        	//Nguyên liệu số 3
        	['name' => 'Trà Olong',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 30],
        	//Nguyên liệu số 4
        	['name' => 'Pepsi',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 30],
        	//Nguyên liệu số 5
        	['name' => 'Trà Đen',
        	'ingredient_unit' => 'g',
        	'amount_stock' => 2500],
        	//Nguyên liệu số 6
        	['name' => 'Trà Nhài',
        	'ingredient_unit' => 'g',
        	'amount_stock' => 2000],
        	//Nguyên liệu số 7
        	['name' => 'Cozy Đào',
        	'ingredient_unit' => 'Gói',
        	'amount_stock' => 90],
        	//Nguyên liệu số 8
        	['name' => 'Trà Lipton',
        	'ingredient_unit' => 'Gói',
        	'amount_stock' => 80],
        	//Nguyên liệu số 9
        	['name' => 'Sprite',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 30],
        	//Nguyên liệu số 10
        	['name' => 'Coca Cola',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 30],
        	//Nguyên liệu số 11
        	['name' => '7 Up',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 30],
        	//Nguyên liệu số 12
        	['name' => 'Fanta',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 30],
        	//Nguyên liệu số 13
        	['name' => 'Mirinda Soda Kem',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 30],
        	//Nguyên liệu số 14
        	['name' => 'Siro Đào',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 10],
        	//Nguyên liệu số 15
        	['name' => 'Siro Dâu',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 10],
        	//Nguyên liệu số 16
        	['name' => 'Siro Táo',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 10],
        	//Nguyên liệu số 17
        	['name' => 'Siro Bạc Hà',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 10],
        	//Nguyên liệu số 18
        	['name' => 'Siro Việt Quất',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 10],
        	//Nguyên liệu số 19
        	['name' => 'Siro Xoài',
        	'ingredient_unit' => 'Chai',
        	'amount_stock' => 10],
        	//Nguyên liệu số 20
        	['name' => 'Sữa Bột Singapore',
        	'ingredient_unit' => 'g',
        	'amount_stock' => 1000],
        	//Nguyên liệu số 21
        	['name' => 'Bột Rau Câu Dẻo Jelly',
        	'ingredient_unit' => 'g',
        	'amount_stock' => 1200],
        	//Nguyên liệu số 22
        	['name' => 'Sữa Tươi Vinamilk',
        	'ingredient_unit' => 'ml',
        	'amount_stock' => 2000],
        	//Nguyên liệu số 23
        	['name' => 'Nescafe',
        	'ingredient_unit' => 'Gói',
        	'amount_stock' => 50],
        	//Nguyên liệu số 24
        	['name' => 'Vinacafe',
        	'ingredient_unit' => 'Gói',
        	'amount_stock' => 55],
        	//Nguyên liệu số 25
        	['name' => 'Cafe Phố',
        	'ingredient_unit' => 'Gói',
        	'amount_stock' => 60],
        ]);
    }
}
