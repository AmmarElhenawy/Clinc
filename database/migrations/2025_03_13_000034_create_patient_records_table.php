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
        Schema::create('patient_record', function (Blueprint $table) {
            $table->id();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->text('medications')->nullable();
            $table->string('diet_plan')->nullable();
            $table->string('diabetes_duration')->nullable();//مده السكر
            //Tests (التحاليل)
            $table->boolean('fasting_blood_sugar')->default(false);//(سكر صائم)
            $table->boolean('post_meal_blood_sugar')->default(false);//(سكر فاطر) //error laravel (-)X
            $table->boolean('hba1c')->default(false);//(سكر تراكمي)
            //Examinations (الفحوصات)
            $table->boolean('kidney_function_tests')->default(false);//(وظائف كلى)
            $table->boolean('retinal_examination')->default(false);//(فحص قاع العين)
            $table->boolean('ecg')->default(false);//(رسم قلب)
            //Complaints (الشكاوى)
            $table->boolean('numbness')->default(false);//(تنميل)
            $table->boolean('burning_sensation')->default(false);//(حرقان)
            $table->boolean('tingling')->default(false);//(شكشكة)
            $table->boolean('cold_extremities')->default(false);// (برودة الأطراف)
            $table->boolean('muscle_cramps')->default(false);//(شد عضلي)

            $table->string('status')->default("كشف");//كشف اعاده
            $table->integer('value_status')->default(1);//for search

            $table->string('status2')->default("تم الكشف");//تم الكشف لم يكشف
            $table->integer('value_status2')->default(1);//for search

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
