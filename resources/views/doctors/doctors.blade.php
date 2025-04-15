@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Empty</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        @foreach ($doctor as $doc)

            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card text-center">
                    <div>

                        <div class="dropdown text-center">
                            <button class="btn btn-link text-dark p-0 m-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical text-gray" style="font-size: 24px;"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('patientsDocRecord/' . $doc->id) }}">سجل المرضى</a>
                                <a class="dropdown-item" href="{{ url('doctorDetails/' . $doc->id) }}">بيانات الدكتور</a>
                                <a class="dropdown-item"
                                data-id="{{ $doc->id }}"
                                data-doctor_full_name="{{ $doc->doctor_full_name }}"
                                {{-- data-last_name="{{ $doc->Last_name }}" --}}
                                data-email="{{ $doc->email }}"
                                data-phone_number="{{ $doc->phone_number }}"
                                data-specialty="{{ $doc->specialty }}"
                                data-address="{{ $doc->address }}"
                                data-qualifications="{{ $doc->qualifications }}"
                                data-toggle="modal"
                                data-target="#modaldemo7">
                                تعديل
                             </a>                                {{-- <a class="btn btn-outline-danger dropdown-item " data-effect="effect-scale"
                                data-id="{{ $inv->id }}" data-invnumber="{{$inv->invoice_number}}" data-toggle="modal" data-target="#modaldemo7"
                                title="حذف"><i class="las la-trash"> حذف </i></a> --}}
                                <a class="dropdown-item" href="{{ url('deleteDoctor/' . $doc->id) }}">حذف</a>
                            </div>
                        </div>


                    </div>
                    <img class="card-img-top w-100" src="{{URL::asset('assets/img/photos/7.jpg')}}" alt="">
                    <div class="card-body">
                        <h4 class="card-title mb-3">{{$doc->doctor_full_name}}</h4>
                        <h6 class=" mb-2 ">{{$doc->specialty}}</h6>
                        <div class="row">
                            <div class="col">
                                <p> الحالات المؤجله</p>
                                <p class="card-text">{{$doc->total_patients}} </p>
                            </div>
                            <div class="col">
                                <p> حالات الكشف</p>
                                <p class="card-text">{{$doc->examined}} </p>
                                {{-- <p class="card-text">{{$count}} </p> --}}
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{url('patientsDocRecord')}}/{{$doc->id}}"> سجل المرضي</a>
                        <a class="btn btn-warning" href="{{url('doctorDetails')}}/{{$doc->id}}"> بيانات الدكتور </a>
                        <a class="btn btn-success" href="{{url('examinedDoctorRecords')}}/{{$doc->id}}"> بيانات حالات الكشف </a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 ">
            <a class="fas fa-plus-circle fa-6x  " style="color: green;" data-effect="effect-super-scaled"
                data-toggle="modal" href="#modaldemo8"> </a>
            {{-- <i class="fas fa-plus-circle fa-2x" style="color: green;"></i> --}}
        </div>

    </div>
    <!-- row closed -->

    </div>
    <!-- Container closed -->
    </div>
    <div class="modal" id="modaldemo7">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <form action="{{ route('doctorspUpdate',$doc->id) }}"  enctype="multipart/form-data"
                                autocomplete="off">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <div class="row">
                                    <div class="col">
                                        {{-- <form method="post" action="{{ url('/doctorDetails') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                name="file_name" required>
                                            <input type="hidden" id="customFile" name="Doctor_full_name"
                                                value="{{ $doc->doctor_full_name }}">
                                            <input type="hidden" id="id" name="id"
                                                value="{{ $doc->id }}">
                                            <label class="custom-file-label" for="customFile">حدد
                                                المرفق</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm "
                                            name="uploadedFile">تاكيد</button>
                                    </form> --}}
                                    </div>
                                    <div class="col">
                                        <label for="Doctor_full_name" class="control-label">الأسم  </label>
                                        <input type="text" class="form-control" id="Doctor_full_name" name="Doctor_full_name" required>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col">
                                        <label for="Email" class="control-label">البريد الالكتروني </label>
                                        <input type="text" class="form-control" id="Email" name="Email" required>
                                    </div>

                                    <div class="col">
                                        <label for="Phone_number" class="control-label">رقم الهاتف</label>
                                        <input type="text" class="form-control" id="Phone_number" name="Phone_number"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="Specialty" class="control-label">التخصص</label>
                                        <input type="text" class="form-control" id="Specialty" name="Specialty" required>
                                    </div>

                                    <div class="col">
                                        <label for="Address" class="control-label">العنوان</label>
                                        <input type="text" class="form-control" id="Address" name="Address" required>
                                    </div>
                                </div>



                                <div class="col">
                                    <label for="Qualifications" class="control-label">المؤهلات</label>
                                    <input type="text" class="form-control" id="Qualifications" name="Qualifications"
                                        required>
                                </div>
                        </div>

                        {{-- <div class="col">
                            <label for="status" class="control-label">الحالة</label>
                            <select name="Status" id="status" class="form-control" required>
                                <option value="" selected disabled>حدد الحالة</option>
                                <option value="متاح">متاح</option>
                                <option value="غير متاح">غير متاح</option>
                            </select>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col">
                                <label for="value_status" class="control-label">قيمة الحالة</label>
                                <input type="text" class="form-control" id="value_status" name="Value_status" required>
                            </div> --}}

                            {{-- <div class="row">
                                <div class="col">
                                    <label for="referred_cases" class="control-label">الحالات
                                        المحالة</label>
                                    <input type="text" class="form-control" id="referred_cases" name="Referred_casses">
                                </div>

                                <div class="col">
                                    <label for="examined" class="control-label">تم فحصه</label>
                                    <input type="number" class="form-control" id="examined" name="Examined" required>
                                </div> --}}

                                {{--
                            </div> --}}


                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">


                            <form action="{{ route('doctors.store') }}" method="post" enctype="multipart/form-data"
                                autocomplete="off">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <form method="post" action="{{ url('/doctorProfile') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                name="file_name" required>
                                            <input type="hidden" id="customFile" name="Doctor_full_name"
                                                value="{{ $doc->doctor_full_name }}">
                                            <input type="hidden" id="id" name="id"
                                                value="{{ $doc->id }}">
                                            <label class="custom-file-label" for="customFile">حدد
                                                المرفق</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm "
                                            name="uploadedFile">تاكيد</button>
                                    </form>
                                    </div>
                                    <div class="col">
                                        <label for="First_name" class="control-label">الأسم الأول </label>
                                        <input type="text" class="form-control" id="First_name" name="First_name" required>
                                    </div>
                                    <div class="col">
                                        <label for="Last_name" class="control-label">الأسم الأخير </label>
                                        <input type="text" class="form-control" id="Last_name" name="Last_name" required>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">
                                        <label for="Email" class="control-label">البريد الالكتروني </label>
                                        <input type="text" class="form-control" id="Email" name="Email" required>
                                    </div>

                                    <div class="col">
                                        <label for="Phone_number" class="control-label">رقم الهاتف</label>
                                        <input type="text" class="form-control" id="Phone_number" name="Phone_number"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="Specialty" class="control-label">التخصص</label>
                                        <input type="text" class="form-control" id="Specialty" name="Specialty" required>
                                    </div>

                                    <div class="col">
                                        <label for="Address" class="control-label">العنوان</label>
                                        <input type="text" class="form-control" id="Address" name="Address" required>
                                    </div>
                                </div>



                                <div class="col">
                                    <label for="Qualifications" class="control-label">المؤهلات</label>
                                    <input type="text" class="form-control" id="Qualifications" name="Qualifications"
                                        required>
                                </div>
                        </div>

                        {{-- <div class="col">
                            <label for="status" class="control-label">الحالة</label>
                            <select name="Status" id="status" class="form-control" required>
                                <option value="" selected disabled>حدد الحالة</option>
                                <option value="متاح">متاح</option>
                                <option value="غير متاح">غير متاح</option>
                            </select>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col">
                                <label for="value_status" class="control-label">قيمة الحالة</label>
                                <input type="text" class="form-control" id="value_status" name="Value_status" required>
                            </div> --}}

                            {{-- <div class="row">
                                <div class="col">
                                    <label for="referred_cases" class="control-label">الحالات
                                        المحالة</label>
                                    <input type="text" class="form-control" id="referred_cases" name="Referred_casses">
                                </div>

                                <div class="col">
                                    <label for="examined" class="control-label">تم فحصه</label>
                                    <input type="number" class="form-control" id="examined" name="Examined" required>
                                </div> --}}

                                {{--
                            </div> --}}


                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
<script>
    $('#modaldemo7').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)

        var id = button.data('id');
        var doctor_full_name = button.data('doctor_full_name');
        var email = button.data('email');
        var phone_number = button.data('phone_number');
        var specialty = button.data('specialty');
        var address = button.data('address');
        var qualifications = button.data('qualifications');

        var modal = $(this);

        modal.find('#Doctor_full_name').val(doctor_full_name);
        modal.find('#Email').val(email);
        modal.find('#Phone_number').val(phone_number);
        modal.find('#Specialty').val(specialty);
        modal.find('#Address').val(address);
        modal.find('#Qualifications').val(qualifications);

        // لو عايز تضيف id hidden في الفورم مثلاً
        modal.find('form').append('<input type="hidden" name="id" value="' + id + '">');
    });
</script>

@endsection
