<?php

use Illuminate\Database\Seeder;

class OrdersOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_out')->insert([
            ['user_id' => 2,
            'total' => 90000,
            'status' => 0],
            ['user_id' => 2,
            'total' => 90000,
            'status' => 1]
        ]);
    }
}
