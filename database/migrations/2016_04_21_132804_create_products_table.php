<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_category_id')->unsigned();
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 10, 2);
            $table->integer('sort_order')->unsigned()->nullable();
            $table->boolean('active')->default(1);
            $table->string('thumbnail_location_1')->nullable();
            $table->string('thumbnail_location_2')->nullable();
            $table->string('thumbnail_location_3')->nullable();
            $table->string('image_location_1')->nullable();
            $table->string('image_location_2')->nullable();
            $table->string('image_location_3')->nullable();
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
        Schema::drop('products');
    }
}
