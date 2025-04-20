<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Carbon;
use Carbon\Carbon;



use App\Models\patientRecord;
use App\Models\patients;
use App\Models\doctor;

use Illuminate\Http\Request;

class PatientRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor=doctor::all();
        // return view('records.records',compact('doctor'));
        $patientRecord=patientRecord::all();
        // $patients=patients::all();
        return view('patients.patients_record',compact('patientRecord','doctor'));
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
        // إنشاء سجل في جدول المرضى وتخزينه في متغير لاسترجاع المعرف (id)
        $patient = patients::create([
            'patient_full_name' => $request->First_name . " " . $request->Last_name,
            'address' => $request->Address,
            'age' => $request->Age,
            'phone_number' => $request->Phone_number,
            'doctor_id' => $request->Doctor_id,
        ]);

        // إنشاء سجل في جدول سجلات المرضى وربطه بالمعرف الخاص بالمريض
        patientRecord::create([
            'patient_id' => $patient->id, // ربط السجل بالمريض
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

        session()->flash('add', 'تم اضافه المنتج بنجاح');
        return redirect('patientsRecord');
    }


    /**
     * Display the specified resource.
     */
    public function show(patientRecord $patientRecord)
    {
        $doctor=doctor::all();
        // return view('records.records',compact('doctor'));
        $patientRecord=patientRecord::all();
        return view('patients.add_patients',compact('patientRecord','doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patientRecord $patientRecord)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patientRecord $patientRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(patientRecord $patientRecord)
    {
        //
    }
    public function showReEx()
    {

        $patientRecord=patientRecord::all();
        return view('patients.reExamination',compact('patientRecord'));
    }
//تم الكشف page
    public function showExamined()
    {
        //متسخدمش table
        // $patientRecord=DB::table('patient_record')
        // ->where('value_status',1)
        // ->get();

        //استخدم eloquent model
        $patientRecord=patientRecord::where('value_status',1)->get();
        $doctor=doctor::all();
        return view('records.examined_records',compact('patientRecord','doctor'));
    }


    public function showTodayRec()
    {
        $today=Carbon::today();
        //استخدم eloquent model
        $patientRecord=patientRecord::whereDate('created_at',$today)
        ->get();
        $doctor=doctor::all();
        return view('records.today_records',compact('patientRecord','doctor'));
    }


    public function showTransfered()
    {
$patientRecord = PatientRecord::join('patients','patient_record.patient_id','=','patients.id')
                ->whereNotNull('patients.doctor_id')
                ->get();

$doctor = Doctor::all();
return view('records.transfered_records', compact('patientRecord', 'doctor'));
    }
    public function toggleStatus($id)
    {
        $patient=patientRecord::FindOrFail($id);
        $patient->value_status=$patient->value_status==1?0:1;//flip لو 1 رجع 0 والعكس
        $patient->save();
        return response()->json(['value_status' => $patient->value_status]);//استجابة JSON تحتوي على قيمة value_status بعد تحديثها.
    }

    public function showPrescription(){
        return view('Prescription/prescription');
    }
    public function showInvoice(){
        return view('Prescription/invoice');
    }
}
