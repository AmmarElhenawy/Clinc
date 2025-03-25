<?php

namespace App\Http\Controllers;

use App\Models\doctorDetails;
use App\Models\doctor;
use Illuminate\Http\Request;

class DoctorDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(doctorDetails $doctorDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor=doctor::where('id',$id)->first();
        return view('doctors.doctorDetails',compact('doctor'));
        // return redirect('doctors.doctorDetails',compact('doctor'));//error //redirect
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, doctorDetails $doctorDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(doctorDetails $doctorDetails)
    {
        //
    }
}
