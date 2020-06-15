<?php

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
        	//Khách hàng thân thiết số 1
        	['first_name' => 'Xuân Trường',
        	'last_name' => 'Phan',
        	'phone_number' => '0987607976'],
        	//Khách hàng thân thiết số 2
        	['first_name' => 'Thành Phúc',
        	'last_name' => 'Nguyễn',
        	'phone_number' => '0344130997'],
        	//Khách hàng thân thiết số 3
        	['first_name' => 'Tấn Phát',
        	'last_name' => 'Nguyễn',
        	'phone_number' => '0966630549'],
        	//Khách hàng thân thiết số 4
        	['first_name' => 'Phước Sang',
        	'last_name' => 'Nguyễn',
        	'phone_number' => '0966797350'],

        ]);
    }
}
