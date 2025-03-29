<?php

namespace App\Observers;
use App\Models\doctor;
use App\Models\PatientRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PatientRecordObserver
{
    /**
     * Handle the PatientRecord "created" event.
     */
    public function created(PatientRecord $patientRecord): void
    {
        $doctorId = $patientRecord->patient->doctor_id;

        $count = PatientRecord::join('patients', 'patient_record.patient_id', '=', 'patients.id')
        ->where('patients.doctor_id', '=', $doctorId)
        ->where('patient_record.value_status', 1)
        ->count();

    DB::table('doctors')
        ->where('id', $doctorId)
        ->update(['examined' => $count]);
}


    /**
     * Handle the PatientRecord "updated" event.
     */
    public function updated(PatientRecord $patientRecord): void
    {
        $doctorId = $patientRecord->patient->doctor_id;

        $count = PatientRecord::join('patients', 'patient_record.patient_id', '=', 'patients.id')
        ->where('patients.doctor_id', '=', $doctorId)
        ->where('patient_record.value_status', 1)
        ->count();

    DB::table('doctors')
        ->where('id', $doctorId)
        ->update(['examined' => $count]);
    }

    /**
     * Handle the PatientRecord "deleted" event.
     */
    public function deleted(PatientRecord $patientRecord): void
    {
        //
    }

    /**
     * Handle the PatientRecord "restored" event.
     */
    public function restored(PatientRecord $patientRecord): void
    {
        //
    }

    /**
     * Handle the PatientRecord "force deleted" event.
     */
    public function forceDeleted(PatientRecord $patientRecord): void
    {
        //
    }
}
