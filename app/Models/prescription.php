<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    protected $fillable = [
        'period',
        'date',
        'type',
        'drug_name',
        'concentration',
        'times',
        'patient_record_id',
    ];
    }
