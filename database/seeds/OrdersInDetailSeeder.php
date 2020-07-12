<?php

use Illuminate\Database\Seeder;

class OrdersInDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_in_detail')->insert(
            [['order_in_id' => 1,
            'ingredient_id' => 1,
            'price' => 20000,
            'amount' => 1],
            ['order_in_id' => 1,
            'ingredient_id' => 2,
            'price' => 25000,
            'amount' => 1],
            ['order_in_id' => 1,
            'ingredient_id' => 3,
            'price' => 25000,
            'amount' => 1],
            ['order_in_id' => 1,
            'ingredient_id' => 4,
            'price' => 20000,
            'amount' => 1]]
        );
    }
}
