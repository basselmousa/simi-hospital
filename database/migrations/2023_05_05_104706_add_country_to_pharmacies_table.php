<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pharmacies', function (Blueprint $table) {
            //
            $table->string("country");
            $table->string("building_number");
            $table->string("phone_number");
            $table->string("logo");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pharmacies', function (Blueprint $table) {
            //
            $table->dropColumn("country");
            $table->dropColumn("building_number");
            $table->dropColumn("phone_number");
            $table->dropColumn("logo");
        });
    }
};
