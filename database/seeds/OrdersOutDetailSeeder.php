<?php

use Illuminate\Database\Seeder;

class OrdersOutDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_out_detail')->insert(
            [['order_out_id' => 1,
            'product_id' => 1,
            'price' => 20000,
            'amount' => 1],
            ['order_out_id' => 1,
            'product_id' => 2,
            'price' => 25000,
            'amount' => 1],
            ['order_out_id' => 1,
            'product_id' => 3,
            'price' => 25000,
            'amount' => 1],
            ['order_out_id' => 1,
            'product_id' => 4,
            'price' => 20000,
            'amount' => 1]]
        );
    }
}
