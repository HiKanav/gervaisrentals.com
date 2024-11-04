<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcknowledgementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acknowledgements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('thumbnail_location');
            $table->string('file_location');
            $table->integer('sort_order')->unsigned()->nullable();
            $table->boolean('active')->default(1);
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
        Schema::drop('acknowledgements');
    }
}
