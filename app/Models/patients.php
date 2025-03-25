<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\doctor;


class patients extends Model
{
    // use HasFactory, SoftDeletes;

    protected $fillable = [
        'user',
        'patient_full_name',
        'address',
        'age',
        'phone_number',
        'doctor_id'
    ];
    public function doc_id(): BelongsTo //patient_id X متسميش نفس اسم العمود عندك عشان لارافل يفهمها
    {
        return $this->belongsTo(doctor::class, 'doctor_id');
    }
}
