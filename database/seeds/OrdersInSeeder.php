<?php

use Illuminate\Database\Seeder;

class OrdersInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_in')->insert([
            ['user_id' => 2,
            'total' => 100000]
        ]);
    }
}
