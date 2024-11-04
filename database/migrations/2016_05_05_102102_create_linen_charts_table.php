<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinenChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linen_charts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('thumbnail_location')->nullable();
            $table->string('54 X 54')->nullable();
            $table->string('72 X 72')->nullable();
            $table->string('85 X 85')->nullable();
            $table->string('54 X 120')->nullable();
            $table->string('72 X 144')->nullable();
            $table->string('90 X 144')->nullable();
            $table->string('96"RND')->nullable();
            $table->string('120" RND')->nullable();
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
        Schema::drop('linen_charts');
    }
}
