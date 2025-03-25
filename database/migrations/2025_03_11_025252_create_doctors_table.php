<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable()->default('anonymous');
            $table->string('doctor_full_name');
            $table->string('profile_image')->nullable();
            $table->integer('phone_number');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('specialty');
            $table->string(column: 'qualifications');
            $table->integer('referred_casses')->nullable();
            $table->integer('examined')->nullable();
            $table->string('status')->nullable()->default("متاح");
            $table->integer('value_status')->nullable()->default(1);//for search
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
