<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//Tự động thêm seeder từ class
        $this->call([
        	CategoriesSeeder::class,
        	ProductsSeeder::class,
        	RolesSeeder::class,
        	UsersSeeder::class,
        	CustomersSeeder::class,
            IngredientsSeeder::class,
            OrdersOutSeeder::class,
            OrdersOutDetailSeeder::class,
            OrdersInSeeder::class,
            OrdersInDetailSeeder::class
        ]);
    }
}
