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
        Schema::create('doctor_labs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("doctor_id")->constrained("doctors")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("medical_lab_id")->constrained("medical_labs")->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('doctor_labs');
    }
};
