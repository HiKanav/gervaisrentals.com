<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinenSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linen_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_category_id')->unsigned();
            $table->string('white_linen1');
            $table->string('white_linen2');
            $table->string('white_cotton');
            $table->string('colour_linen');
            $table->string('white_visa_damask');
            $table->string('ambassador_linen');
            $table->string('linen_size');
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
        Schema::drop('linen_sizes');
    }
}
