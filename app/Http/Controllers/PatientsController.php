<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\patients;
use App\Models\prescription;
use App\Models\patientRecord;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients=patients::all();
        return view('patients.patients',compact('patients'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $patients=patients::all();
        return view('patients.patients',compact('patients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $patients=patients::where('id',$id)->first();
        $patientRecord=patientRecord::where('patient_id',$id)->first();
        // $patients=patients::all();
        return view('patients.reExamination',compact( 'patients','patientRecord'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patients $patients)
    {
        //مينفعش find عشان بتبحث بل id الاصلي بس انما where اي عمود عادي
        $PR=patientRecord::where('patient_id',$request->id)->firstOrFail();
        $PR->update([
            'patient_id' => $request->id, // ربط السجل بالمريض
            'weight' => $request->Weight,
            'height' => $request->Height,
            'medications' => $request->Medications,
            'diet_plan' => $request->Diet_plan,
            'diabetes_duration' => $request->Diabetes_duration,
            'fasting_blood_sugar' => $request->Fasting_blood_sugar,
            'post_meal_blood_sugar' => $request->Post_meal_blood_sugar,
            'hba1c' =>  $request->Hba1c,
            'kidney_function_tests'=>$request->Kidney_function_tests,
            'retinal_examination' => $request->Retinal_examination,
            'ecg' => $request->Ecg,
            'numbness' => $request->Numbness,
            'burning_sensation' => $request->Burning_sensation,
            'tingling' => $request->Tingling,
            'cold_extremities' => $request->Cold_extremities,
            'muscle_cramps' => $request->Muscle_cramps,
            'status' =>  $request->Status,
            'value_status' => (int) $request->value_status,
        ]);
        return redirect('/patientsRecord');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patients=patients::where('id',$id)->delete();
        return back();
    }
    public function showPatientDetails($id)
    {
        $pr=patientRecord::where('patient_id',$id)->value('id');
        $patients=patients::where('id',$id)->first();
        $patientRecord=patientRecord::where('patient_id',$id)->first();
        $prescription=prescription::where('patient_record_id',$pr)->get();

        // $patients=patients::all();
        return view('patients.patient_details',compact( 'patients','patientRecord','prescription'));
    }
    public function transToDoctor(Request $request, $id)
    {

        $patient = patients::find($id);

        // if (!$patient) {
        //     return response()->json([
        //         'message' => 'المريض غير موجود'
        //     ], 404);
        // }

        $patient->update([
            'doctor_id' =>$request->Doctor_id,
        ]);

        return
        back();
        // response()->json([
        //     'message' => 'تم تحديث الطبيب للمريض بنجاح',
        //     'Doctor_id' =>$request->Doctor_id,
        //     'Patient_id' => $id
        // ]);
    }


}
