<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $fillable = [
        'user',
        'profile_image',
        'doctor_full_name',
        'phone_number',
        'email',
        'address',
        'specialty',
        'qualifications',
        'referred_casses',
        'examined',
        'status',
        'value_status'
        ];
        public function profile()
        //one to one relation
        {
            return $this->hasOne(doctor_profile::class, 'doctor_id');
        }
        public function patient()
        //one to one relation
        {
            return $this->hasMany(patients::class, 'doctor_id');
        }
    }
