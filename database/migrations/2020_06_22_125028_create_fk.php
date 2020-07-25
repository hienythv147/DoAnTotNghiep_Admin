<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('orders_out', function (Blueprint $table) {
            $table->foreign('staff_id')->references('id')->on('users');
        });
        Schema::table('orders_in', function (Blueprint $table) {
            $table->foreign('staff_id')->references('id')->on('users');
        });
        Schema::table('orders_out_detail', function (Blueprint $table) {
            $table->foreign('order_out_id')->references('id')->on('orders_out');
            $table->foreign('product_id')->references('id')->on('products');
        });
        Schema::table('orders_in_detail', function (Blueprint $table) {
            $table->foreign('order_in_id')->references('id')->on('orders_in');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }
}
