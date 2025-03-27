<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\doctor;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $count = DB::table('doctors')
        //     ->leftJoin('patients', 'doctors.id', '=', 'patients.doctor_id')
        //     ->select('doctors.id as doctor_id', DB::raw('COUNT(patients.id) as total_patients'))
        //     ->groupBy('doctors.id')
        //     ->get();
        $doctor=doctor::all();

        $count= DB::table('doctors')
    ->leftJoin('patients', 'doctors.id', '=', 'patients.doctor_id')
    ->select('doctors.id as doctor_id', DB::raw('COUNT(patients.id) as total_patients'))
    ->groupBy('doctors.id')
    ->get();



    //عرض جميع الحالات
    $count2= DB::table('patients')
    ->select(DB::raw('COUNT(id) as all_patients'))
    ->first();//عشان هي قيمه واحده بس //first() return object

    //حالات تم الكشف
        $EXcount = DB::table('patient_record')
        ->where('value_status', 1) // تحديد القيم المطلوبة فقط
        ->count();// بيرجع القيمه صحيحه علي طول count()

        $transCount = DB::table('patients')
        ->whereNotNull('doctor_id' ) //
        ->count();// بيرجع القيمه صحيحه علي طول count()

// foreach عشان يمر علي كل صف ويعمل التحديث
foreach ($count as $co) {
    DB::table('doctors')
        ->where('id', $co->doctor_id)
        ->update(['total_patients' => $co->total_patients]);
}

//مش هنحتاج لووب عشان هي قيمه ثابته ف كلو
//تحديث
    DB::table('doctors')
        ->update(['all_patients' => $count2->all_patients]);//->all_patients because its object

        //حالات تم الكشف
        DB::table('patients')
        ->update(['examined_count' => $EXcount]);// بيرجع القيمه صحيحه علي طول count()

        DB::table('patients')
        ->update(['transfere_count'=>$transCount]);


        return view('records.records',compact('doctor','count','count2','EXcount','transCount'));
    }
}
