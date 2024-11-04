<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsPercentToExtraCharges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('extra_charges', function (Blueprint $table) {
            $table->boolean('is_percent')->after('price')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('extra_charges', function (Blueprint $table) {
            $table->dropColumn('is_percent');
        });
    }
}
