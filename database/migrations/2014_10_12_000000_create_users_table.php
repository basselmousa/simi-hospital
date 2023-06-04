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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 1500);
            $table->string('email',1500)->unique();
            $table->string('ssn',1500)->unique();
            $table->string('phone_number',1500)->unique();
            $table->string('image',1500)->nullable();
            $table->string('gender',1500);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',1500);
            $table->string("country",1500);
            $table->string("city",1500);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
