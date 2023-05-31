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
        Schema::table('prescription_requests', function (Blueprint $table) {
            //
            $table->foreignId("pharmacy_id")->nullable()->constrained("pharmacies")->nullOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prescription_requests', function (Blueprint $table) {
            //
            $table->dropConstrainedForeignId("pharmacy_id");
        });
    }
};
