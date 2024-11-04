<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTentCategoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tent_category_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tent_category_id')->unsigned();
            $table->string('size');
            $table->string('seating');
            $table->string('pole_drapes');
            $table->decimal('asphalt_charges', 10, 2);
            $table->decimal('price_installed', 10, 2);
            $table->string('thumbnail_location');
            $table->string('main_location');
            $table->integer('sort_order')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tent_category_products');
    }
}
