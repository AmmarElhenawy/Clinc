<?php

namespace App\Http\Controllers;

use App\Models\prescription;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\patientRecord;


class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $patient= patients::where('id',$id)->first();
        return view('Prescription/prescription',compact('patient'));
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
        // $id=$request->Id;
        $prescription=prescription::create([
            'patient_record_id' => $request->Id,
            'period' => $request->Period,
            'date' => now(),
            'type' => $request->Type,
            'drug_name' => $request->Drug_name,
            'concentration' => $request->Concentration,
            'times' => $request->Times,
        ]);
        return back();
        }

    /**
     * Display the specified resource.
     */
    public function show(prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prescription $prescription)
    {
        //
    }
    public function showInvoice($id){
        $patient = patients::where('id', $id)->first(); // لو متوقع واحد بس
        $prescription = prescription::where('patient_record_id', $id)->first();
        $patient_rec = patientRecord::where('patient_id', $id)->first(); // لو متوقع سجل واحد فقط

        // $id_patient=$id;
        return view('Prescription/invoice',compact('patient','prescription','patient_rec'));
    }
    public function showInfo($id){
        $patients = patients::where('id', $id)->first(); // لو متوقع واحد بس
        $patientRecord = patientRecord::where('patient_id', $id)->first(); // لو متوقع سجل واحد فقط

        // $id_patient=$id;
        return view('Prescription/info',compact('patients','patientRecord'));
    }
}
