<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\PatientRecord;
use App\Models\doctor_profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Patients;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //with count bt3ml el 2sm mn nfsha / patient+count =patient_count
        // patient دي realtion hasMany in doctor controller
        $doctor=doctor::withCount('patient')->get();
        return view('doctors.doctors',compact('doctor'));
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
        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required|email|unique:doctors',
        //     'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // ],[
        //     'first_name.required'=>'يرجي ادخال الاسم',
        //     'last_name.exists'=>'القسم غير الاسم',
        //     'email.unique'=>'يرجي ادخال الايميل',
        // ]);
        // if ($request->hasFile('Profile_image')) {
        //     $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            // $doctor->profile_image = $imagePath;
        // }
        $doctor=doctor::create([
            'doctor_full_name' => $request->First_name." ".$request->Last_name ,
            // 'profile_image' => $request->$imagePath,
            'status' => $request->Status,
            'specialty' => $request->Specialty,
            'value_status' => $request->Value_status,
            // 'doctor_id' => $request->Doctor_id,
            'phone_number' => $request->Phone_number,
            'referred_casses' => $request->Referred_casses,
            'examined' => (int) $request->Examined,
            'email' => $request->Email,
            'address' => $request->Address,
            'qualifications' => $request->Qualifications,
        ]);


        // profile image
        $image=$request->file('file_name');
        $file_name=$image->getClientOriginalName();
        $doctorName=$doctor->doctor_full_name;
        $Doctor_id=$doctor->id;
        $attach=new doctor_profile();
        $attach->file_name=$file_name;
        $attach->doctor_full_name=$doctorName;
        $attach->doctor_id=$Doctor_id;
        $attach->create_by=(Auth::user()->name);
        $attach->save();

        $imageName=$request->file_name->getClientOriginalName();
        // $request->pic->move(public_path('attachments/',$invoice_number),$imageName);
        $destinationPath = public_path("profile_images/$doctorName");

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0775, true);
        }

        $image->move($destinationPath, $file_name);
        // session()->flash('Add', 'تم اضافة المرفق بنجاح');
        // return back();

        // profile image

        // session()-> flash('add','تم اضافه المنتج بنجاح');
        return redirect('doctors');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor=doctor::where('id',$id)->first();
        return view('doctors.doctorDetails',compact('doctor'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(doctor $doctor)
    {
// عرض الفورم بس
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, doctor $doctor)
    {
        $doc=doctor::where('id',$request->id)->firstOrFail();
        $doc->update([
            'profile_image' => $request->profile_image,
            'doctor_full_name' => $request->Doctor_full_name,
            'phone_number' => $request->Phone_number,
            'email' => $request->Email,
            'address' => $request->Address,
            'specialty' => $request->Specialty,
            'qualifications' => $request->Qualifications,

        ]);
        return redirect('/doctors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor=doctor::where('id',$id)->delete();
        return back();
    }
    public function toggleStatus($id)
    {
        $doctor=doctor::FindOrFail($id);
        $doctor->value_status=$doctor->value_status==1?0:1;//flip لو 1 رجع 0 والعكس
        $doctor->save();
        return response()->json(['value_status' => $doctor->value_status]);//استجابة JSON تحتوي على قيمة value_status بعد تحديثها.
    }
    // public function add_doctor(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required|email|unique:doctors',
    //         'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ],[
    //         'first_name.required'=>'يرجي ادخال الاسم',
    //         'last_name.exists'=>'القسم غير الاسم',
    //         'email.unique'=>'يرجي ادخال الايميل',
    //     ]);
    //     if ($request->hasFile('Profile_image')) {
    //         $imagePath = $request->file('profile_image')->store('profile_images', 'public');
    //         // $doctor->profile_image = $imagePath;
    //     }
    //     doctor::create([
    //         'doctor_full_name' => $request->First_name." ".$request->Last_name ,
    //         'profile_image' => $request->$imagePath,
    //         'status' => $request->Status,
    //         'specialty' => $request->Specialty,
    //         'value_status' => $request->Value_status,
    //         // 'doctor_id' => $request->Doctor_id,
    //         'phone_number' => $request->Phone_number,
    //         'referred_casses' => $request->Referred_casses,
    //         'examined' => (int) $request->Examined,
    //         'email' => $request->Email,
    //         'address' => $request->Address,
    //         'qualifications' => $request->Qualifications,
    //     ]);


    //     // session()-> flash('add','تم اضافه المنتج بنجاح');
    //     return redirect('doctors');
    // }
    public function patientsDocRecord($id)
    {
        $doctor=doctor::all();
        // $patient=Patients::where('doctor_id',$id)->get();
        $patientRecord = PatientRecord::join('patients','patient_record.patient_id','=','patients.id')
                ->where('patients.doctor_id','=',$id)
                ->get();
        return view('records.doctor_patients_record',compact('patientRecord','doctor'));
    }
    public function examinedDocRecord($id)
    {
        $doctor=doctor::all();
        // $patient=Patients::where('doctor_id',$id)->get();
        $patientRecord = PatientRecord::join('patients','patient_record.patient_id','=','patients.id')
                ->where('patients.doctor_id','=',$id)
                ->where('patient_record.value_status',1)
                ->get();
        $count=PatientRecord::join('patients','patient_record.patient_id','=','patients.id')
        ->where('patients.doctor_id','=',$id)
        ->where('patient_record.value_status',1)->count();

        DB::table('doctors')
        ->where('id',$id)
        ->update(['examined'=>$count]);

        return view('records.examined_doctor_records',compact('patientRecord','doctor'));
    }

}
