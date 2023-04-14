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
        Schema::create('medical_examination_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId("doctor_id")->constrained("doctors")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("user_id")->constrained("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("medical_examination_id")->constrained("medical_examinations")->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('medical_examination_requests');
    }
};
