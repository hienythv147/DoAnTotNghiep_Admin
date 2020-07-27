<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	//Quản trị viên
        	['email' => 'admin@gmail.com',
        	'password' => Hash::make('123'),
        	'first_name' => 'Master',
        	'last_name' => 'Projects',
        	'phone_number' => '0123456789',
        	'role_id' => 1,
        	'address' => 'Dubai'],
        	//Nhân viên 1
        	['email' => 'tranphat123@gmail.com',
        	'password' => Hash::make('123'),
        	'first_name' => 'Tấn Phát',
        	'last_name' => 'Trần Lê',
        	'phone_number' => '0846080119',
        	'role_id' => 2,
        	'address' => 'Cần Giuộc - Long An'],
        	//Nhân viên 2
        	['email' => 'xuansang123@gmail.com',
        	'password' => Hash::make('123'),
        	'first_name' => 'Xuân Sang',
        	'last_name' => 'Nguyễn',
        	'phone_number' => '0373801132',
        	'role_id' => 2,
			'address' => 'Ninh Thuận'],
			// khách hàng 1
        	['email' => '0306171385@caothang.edu.vn',
        	'password' => Hash::make('123'),
        	'first_name' => 'Xuân Sang',
        	'last_name' => 'Nguyễn',
        	'phone_number' => '0373801132',
        	'role_id' => 3,
			'address' => 'Ninh Thuận'],
			// khách hàng 2
        	['email' => 'tp17041999@gmail.com',
        	'password' => Hash::make('123'),
        	'first_name' => 'Phát Bodoi',
        	'last_name' => 'Trần',
        	'phone_number' => '0704443304',
        	'role_id' => 3,
        	'address' => 'Long An']
        ]);
    }
}
