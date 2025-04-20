@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
اضافة فاتورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاحالات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    كشف </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}


                        {{-- @foreach ($patients as $pt ) --}}
                        {{-- foreach eh ya fala7 de field wa7da  --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> اسم المريض</label>
                                <input type="text" class="form-control" id="First_name" name="First_name"
                                value="{{$patients->patient_full_name}}" readonly>
                            </div>
                            {{-- <div class="col">
                                <label for="inputName" class="control-label">الاسم الاخير </label>
                                <input type="text" class="form-control" id="Last_name" name="Last_name"
                                value="{{$patients->patient_full_name}}" readonly>
                            </div> --}}
                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">رقم التليفون </label>
                                <input type="text" class="form-control" id="Phone_number" name="Phone_number"
                                value="{{$patients->phone_number}}" readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">السن </label>
                                <input type="text" class="form-control" id="Age" name="Age" value="{{$patients->age}}" readonly>
                            </div>
                        </div>
                        {{-- 3 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">العنوان </label>
                                <input type="text" class="form-control" id="Address" name="Address"
                                value="{{$patients->address}}" readonly>
                            </div>
                        </div>

                        {{-- @endforeach --}}
                        {{-- 4 --}}

                            <br>
                            <br>
                            <br>

                        <h3 class="card-title">بيانات المريض</h3>
                            <div class="row">
                                    <div class="col">
                                        <label for="inputName" class="control-label"> مده السكر </label>
                                        <input type="text" class="form-control" id="Diabetes_duration" name="Diabetes_duration"
                                        value="{{$patientRecord->diabetes_duration}}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="inputName" class="control-label"> الطول  </label>
                                        <input type="text" class="form-control" id="height" name="Height"
                                        value="{{ $patientRecord->height ?? '' }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="inputName" class="control-label"> الوزن  </label>
                                        <input type="text" class="form-control" id="weight" name="Weight"
                                        value="{{ $patientRecord->weight ?? '' }}" readonly>
                                    </div>

                            </div>

                            {{-- 5 --}}

                            <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label"> الادويه  </label>
                                    <input type="text" class="form-control" id="medications" name="Medications"
                                    value="{{ $patientRecord->medications ?? '' }}" readonly>
                                </div>
                            </div>


                            {{-- 6 --}}
                            <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label">نظام غذائي  </label>
                                    <input type="text" class="form-control" id="diet_plan" name="Diet_plan" value="{{ $patientRecord->diet_plan ?? '' }}"readonly>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            {{-- isset بيتاكد انها موجوده ممكن متستخدمهاش --}}
                            <h5 class="card-title">التحاليل</h5>
                            <div class="row">
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Fasting_blood_sugar" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="fasting_blood_sugar" name="Fasting_blood_sugar"  value="1" {{$checked=isset($patientRecord->fasting_blood_sugar)&&$patientRecord->fasting_blood_sugar==1 ? 'checked':'';}} readonly disabled>
                                    <label for="inputName" class="control-label">سكر صائم </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Post_meal_blood_sugar" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="post_meal_blood_sugar" name="Post_meal_blood_sugar"  value="1"{{$patientRecord->post_meal_blood_sugar==1 ? 'checked':'';}} readonly disabled>
                                    <label for="inputName" class="control-label">سكر فاطر </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Hba1c" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="hba1c" name="Hba1c"  value="1" {{$checked=isset($patientRecord->hba1c)&&$patientRecord->hba1c==1 ? 'checked':'';}}readonly disabled>
                                    <label for="inputName" class="control-label">سكر تراكمي </label>
                                </div>
                            </div>
                            <br>
                            <h5 class="card-title">الفحوصات</h5>
                            <div class="row">
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Kidney_function_tests" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="kidney_function_tests" name="Kidney_function_tests"  value="1" {{$checked=isset($patientRecord->kidney_function_tests)&&$patientRecord->kidney_function_tests==1 ? 'checked':'';}} readonly disabled>
                                    <label for="inputName" class="control-label"> وظائف كلي</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Retinal_examination" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="retinal_examination" name="Retinal_examination"  value="1" {{$checked=isset($patientRecord->retinal_examination)&&$patientRecord->retinal_examination==1 ? 'checked':'';}} readonly disabled>
                                    <label for="inputName" class="control-label">فحص قاع العين  </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Ecg" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="ecg" name="Ecg"  value="1" {{$checked=isset($patientRecord->ecg)&&$patientRecord->ecg==1 ? 'checked':'';}} readonly disabled>
                                    <label for="inputName" class="control-label">رسم قلب  </label>
                                </div>
                            </div>


                            <br>
                            <br>
                            <br>

                            <div class="row">
                                <h5 class="card-title">الشكاوي</h5>

                                <div class="col">
                                {{-- <input type="hidden" class="form-control"  name="Numbness" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="numbness" name="Numbness"  value="1" {{$checked=isset($patientRecord->numbness)&&$patientRecord->numbness==1 ? 'checked':'';}}readonly disabled>
                                    <label for="inputName" class="control-label">تنميل </label>
                                </div>
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Burning_sensation" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="burning_sensation" name="Burning_sensation"  value="1" {{$checked=isset($patientRecord->burning_sensation)&&$patientRecord->burning_sensation==1 ? 'checked':'';}}readonly disabled>
                                    <label for="inputName" class="control-label"> حرقان  </label>
                                </div>
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Tingling" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="tingling" name="Tingling"  value="1" {{$checked=isset($patientRecord->tingling)&&$patientRecord->tingling==1 ? 'checked':'';}} readonly disabled>
                                    <label for="inputName" class="control-label">شكشكة</label>
                                </div>
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Cold_extremities" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="cold_extremities" name="Cold_extremities"  value="1" {{$checked=isset($patientRecord->cold_extremities)&&$patientRecord->cold_extremities==1 ? 'checked':'';}} readonly disabled>
                                    <label for="inputName" class="control-label">برودة الأطراف  </label>
                                </div>
                                <div class="col">
                                    {{-- <input type="hidden" class="form-control"  name="Muscle_cramps" value="0" > --}}
                                    <input type="checkbox" class="form-control" id="muscle_cramps" name="Muscle_cramps"  value="1"{{$checked=isset($patientRecord->muscle_cramps)&&$patientRecord->muscle_cramps==1 ? 'checked':'';}} readonly disabled>
                                    <label for="inputName" class="control-label">شد عضلي  </label>
                                </div>
                            </div>
                            {{-- الحاله --}}
                                {{-- <input type="hidden" class="form-control" id="status" name="Status"  value="كشف">
                                <input type="hidden" class="form-control" id="status" name="Value_status"  value=1> --}}
                            {{-- الحاله --}}

                            {{-- <div class="col-sm-12 col-md-12">
                                <input type="file" name="pic" class="dropify"
                                    accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                            </div> --}}
                            <a href="{{route('prescription',$patients->id)}}" class="btn btn-block btn-primary col-6 mt-5 "> اضافه روشته </a>
                            <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

@endsection
