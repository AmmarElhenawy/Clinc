<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientRecord extends Model
{
    // use HasFactory, SoftDeletes;

    protected $table = 'patient_record';

    protected $fillable = [
        'user',
        'patient_full_name',
        'address',
        'age',
        'phone_number',
        'weight',
        'height',
        'medications',
        'diet_plan',
        'diabetes_duration',
        // Tests (التحاليل)
        'fasting_blood_sugar',
        'post_meal_blood_sugar',
        'hba1c',
        // Examinations (الفوصات)
        'kidney_function_tests',
        'retinal_examination',
        'ecg',
        // Complaints (الشكاوى)
        'numbness',
        'burning_sensation',
        'tingling',
        'cold_extremities',
        'muscle_cramps',
        'status',
        'value_status',
        'doctor_id',
        'patient_id'
    ];
    public function pat_id(): BelongsTo //patient_id X متسميش نفس اسم العمود عندك عشان لارافل يفهمها
{
    return $this->belongsTo(patients::class, 'patient_id');
}

}
