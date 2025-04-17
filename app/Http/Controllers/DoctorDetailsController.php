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
        // $image=$request->file('file_name');
        // $file_name=$image->getClientOriginalName();
        // $doctorName=$request->Doctor_full_name;
        // $Doctor_id=$request->Doctor_id;
        // $attach=new doctor_profile();
        // $attach->file_name=$file_name;
        // // $attach->doctor_full_name=$doctorName;
        // $attach->doctor_id=$Doctor_id;
        // $attach->create_by=(Auth::user()->name);
        // $attach->save();

        // $imageName=$request->file_name->getClientOriginalName();
        // // $request->pic->move(public_path('attachments/',$invoice_number),$imageName);
        // $destinationPath = public_path("profile_images/$doctorName");

        // if (!file_exists($destinationPath)) {
        //     mkdir($destinationPath, 0775, true);
        // }

        // $image->move($destinationPath, $file_name);
        // // session()->flash('Add', 'تم اضافة المرفق بنجاح');
        // return back();

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
