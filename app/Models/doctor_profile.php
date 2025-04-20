<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\doctor;

class doctor_profile extends Model
{
    use HasFactory;

    protected $table = 'doctor_profile'; // ← ← ← هنا التعديل المهم

    protected $fillable = [
        'doctor_id',
        'file_name',
        'create_by',
        ];
        // public function doc_id(): BelongsTo //patient_id X متسميش نفس اسم العمود عندك عشان لارافل يفهمها
        // {
        //     return $this->belongsTo(doctor::class, 'doctor_id');
        // }
        public function doctor()
        {
            return $this->belongsTo(doctor::class, 'doctor_id');
        }
    }
