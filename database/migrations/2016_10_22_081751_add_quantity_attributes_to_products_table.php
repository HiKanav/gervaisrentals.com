<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuantityAttributesToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('quantity_interval')->unsigned()->after('price')->nullable();
            $table->integer('quantity_minimum')->unsigned()->after('quantity_interval')->nullable();
            $table->integer('quantity_maximum')->after('quantity_minimum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['quantity_interval', 'quantity_minimum', 'quantity_maximum']);
        });
    }
}
