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
}
