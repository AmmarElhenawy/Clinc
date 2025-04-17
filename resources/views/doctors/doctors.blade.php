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

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="card text-center shadow-sm" style="max-width: 100%;">

                    <div class="dropdown text-center mt-2">
                        <button class="btn btn-link text-dark p-0 m-0" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical text-gray" style="font-size: 24px;"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('patientsDocRecord/' . $doc->id) }}">سجل المرضى</a>
                            <a class="dropdown-item" href="{{ url('doctorDetails/' . $doc->id) }}">بيانات الدكتور</a>
                            <a class="dropdown-item" data-id="{{ $doc->id }}" data-profile=""
                                data-doctor_full_name="{{ $doc->doctor_full_name }}" data-email="{{ $doc->email }}"
                                data-phone_number="{{ $doc->phone_number }}" data-specialty="{{ $doc->specialty }}"
                                data-address="{{ $doc->address }}" data-qualifications="{{ $doc->qualifications }}"
                                data-toggle="modal" data-target="#modaldemo7">
                                تعديل
                            </a>
                            <a class="dropdown-item" href="{{ url('deleteDoctor/' . $doc->id) }}">حذف</a>
                        </div>
                    </div>

                    @if($doc->profile && $doc->profile->file_name)
                        <img class="card-img-top mx-auto d-block" style="width: 150px; height: 150px; object-fit: cover;"
                            src="{{ asset('profile_images/' . $doc->doctor_full_name . '/' . $doc->profile->file_name) }}" alt="">
                    @else
                        <img class="card-img-top mx-auto d-block" style="width: 150px; height: 150px; object-fit: cover;"
                            src="{{ asset('profile_images/default.png') }}" alt="No Image">
                    @endif

                    <div class="card-body">
                        <h4 class="card-title mb-3">{{$doc->doctor_full_name}}</h4>
                        <h6 class="mb-2">{{$doc->specialty}}</h6>
                        <div class="row">
                            <div class="col">
                                <p>الحالات المؤجلة</p>
                                <p class="card-text">{{$doc->total_patients}}</p>
                            </div>
                            <div class="col">
                                <p>حالات الكشف</p>
                                {{-- bec withcount --}}
                                <p class="card-text">{{$doc->patient_count}}</p>
                            </div>
                        </div>

                        {{-- صغرنا حجم الأزرار بإضافة btn-sm --}}
                        <a class="btn btn-primary btn-sm" href="{{url('patientsDocRecord')}}/{{$doc->id}}">سجل المرضى</a>
                        <a class="btn btn-warning btn-sm" href="{{url('doctorDetails')}}/{{$doc->id}}">بيانات الدكتور</a>
                        <a class="btn btn-success btn-sm" href="{{url('examinedDoctorRecords')}}/{{$doc->id}}">حالات الكشف</a>
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
                            {{-- {{ route('doctorspUpdate', $doc->id) }} --}}
                            <form action="{{route('doctorUpdate')}}" enctype="multipart/form-data" autocomplete="off">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="Id" id="Id" value="">
                                        {{-- <label for="fileUpload" class="control-label">profile img</label>
                                        <input type="file" id="fileUpload" name="file_name" class="form-control"> --}}
                                        {{-- <form method="post" action="{{ route('doctorProfile') }}"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    name="file_name" required>
                                                <input type="hidden" id="customFile" name="Doctor_full_name"
                                                    value="{{ $doc->doctor_full_name }}">
                                                <input type="hidden" id="doctor_id" name="Doctor_id" value="{{ $doc->id }}">
                                                <label class="custom-file-label" for="customFile">حدد
                                                    المرفق</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm "
                                                name="uploadedFile">تاكيد</button>
                                        </form> --}}

                                    </div>
                                    <div class="col">
                                        <label for="Doctor_full_name" class="control-label">الأسم </label>
                                        <input type="text" class="form-control" id="Doctor_full_name"
                                            name="Doctor_full_name" required>
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


                            <form id="doctorForm" action="{{ route('doctors.store') }}" method="post"
                                enctype="multipart/form-data" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">
                                        <label for="fileUpload" class="control-label">profile img</label>
                                        <input type="file" id="fileUpload" name="file_name" class="form-control">
                                        {{-- <input type="hidden" id="doctor_full_name"
                                            value="{{ $doc->doctor_full_name }}"> --}}
                                        {{-- <input type="hidden" id="Doctor_id" value="{{ $doc->id }}"> --}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="First_name" class="control-label">الأسم الأول</label>
                                        <input type="text" class="form-control" id="First_name" name="First_name" required>
                                    </div>
                                    <div class="col">
                                        <label for="Last_name" class="control-label">الأسم الأخير</label>
                                        <input type="text" class="form-control" id="Last_name" name="Last_name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="Email" class="control-label">البريد الالكتروني</label>
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
        $('#modaldemo7').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)

            var id = button.data('id');
            var doctor_full_name = button.data('doctor_full_name');
            var email = button.data('email');
            var phone_number = button.data('phone_number');
            var specialty = button.data('specialty');
            var address = button.data('address');
            var qualifications = button.data('qualifications');

            var modal = $(this);

            modal.find('#Id').val(id);
            modal.find('#Doctor_full_name').val(doctor_full_name);
            modal.find('#Email').val(email);
            modal.find('#Phone_number').val(phone_number);
            modal.find('#Specialty').val(specialty);
            modal.find('#Address').val(address);
            modal.find('#Qualifications').val(qualifications);
            // عشان يحط id بتاع الدوكتور اللي اخترناه عشان منعرفش نحطو مباشر من غير لووب
            // const form = document.getElementById('updateDoctorForm');
            //     form.action = `/doctorspUpdate/${doctor_id}`; // تأكد إن دي نفس الـ route عندك

            // لو عايز تضيف id hidden في الفورم مثلاً
            // modal.find('form').append('<input type="hidden" name="id" value="' + id + '">');
        });
    </script>
    {{--
    <script>
        $('#fileUpload').on('change', function () {
            var fileInput = this.files[0];
            var formData = new FormData();

            formData.append('file_name', fileInput);
            formData.append('Doctor_full_name', $('#doctor_full_name').val());
            formData.append('Doctor_id', $('#Doctor_id').val());
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route("doctorProfile") }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    alert("تم رفع الملف بنجاح");
                    // ممكن تحدث الصفحة أو تعرض رسالة نجاح
                },
                error: function (xhr) {
                    alert("حدث خطأ أثناء الرفع");
                    console.log(xhr.responseText);
                }
            });
        });
    </script> --}}

    {{--
    <script>
        // إرسال البيانات باستخدام AJAX
        $('#doctorForm').on('submit', function (e) {
            e.preventDefault(); // منع الإرسال الافتراضي للفورم

            var formData = new FormData(this); // البيانات المرسلة من الفورم
            formData.append('doctor_id', $('#Doctor_id').val()); // إضافة id الطبيب

            // إرسال البيانات عبر AJAX
            $.ajax({
                url: '{{ route('doctors.store') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    alert('تم حفظ البيانات بنجاح!');
                    // رفع الصورة بعد حفظ البيانات
                    uploadFile();
                },
                error: function (xhr) {
                    alert('حدث خطأ أثناء الحفظ');
                }
            });
        }); --}}

        {
            {
                --{
                {
                    -- // رفع الصورة باستخدام AJAX
                        function uploadFile() {
                            var fileInput = $('#fileUpload')[0].files[0];
                            var formData = new FormData();
                            formData.append('file_name', fileInput);
                            formData.append('doctor_id', $('#Doctor_id').val());
                            formData.append('_token', '{{ csrf_token() }}');

                            $.ajax({
                                url: '{{ route("doctorProfile") }}',
                                type: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function (response) {
                                    alert("تم رفع الملف بنجاح");
                                    // هنا يمكنك تحديث الصفحة أو إظهار رسالة بنجاح
                                },
                                error: function (xhr) {
                                    alert("حدث خطأ أثناء رفع الملف");
                                }
                            });
                        }
    </script> --}}
    {{-- jquery upload من غير زرار تاكيد --}}
    {{--
    <script>
                $(document).ready(function () {
                    $('#customFile').on('change', function () {
                        $('#uploadForm').submit();
                    });
                });
    </script> --}}


@endsection