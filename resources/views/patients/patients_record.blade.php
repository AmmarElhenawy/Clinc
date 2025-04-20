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
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">SIMPLE TABLE</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2"></p>
                </div>
                @can('كشف')
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <a href="{{ route('addPatients') }}" class="btn btn-outline-primary btn-block">
                        كشف
                    </a>
                </div>
                @endcan
                @can('اعاده')
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <a href="{{ route('showPatients') }}" class="btn btn-outline-primary btn-block">
                        اعاده
                    </a>
                </div>
                @endcan
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>التسلسل</th>
                                    <th>المريض</th>
                                    <th>الطول</th>
                                    <th>الوزن</th>
                                    <th>الحاله </th>
                                    <th>تحويل</th>
                                    <th> info </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($patientRecord as $pr)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{$i}}</td>

                                                                <td>{{$pr->pat_id->patient_full_name}}</td>
                                                                <td>{{$pr->height}}</td>
                                                                <td>{{$pr->weight}}</td>
                                                                {{-- <td>{{$doc->examined}}</td> --}}
                                                                <td>
                                                                    @can('حاله الكشف')
                                                                    {{--  class="toggleButton" بيضيف لكل ازرار الصفوف عكس id="toggleButton" --}}
                                                                    <button
                                                                    class="toggleButton btn {{ $pr->value_status == 1 ? 'btn-success' : 'btn-danger' }}"data-id="{{ $pr->id }}">
                                                                    {{ $pr->value_status == 1 ? 'كشف' : 'اعاده' }}
                                                                </button>
                                                                @endcan
                                                            </td>
                                                            <td>
                                                                @can('تحويل الي دوكتور')
                                                                <form  action="{{ route( 'transfereToDoctor',$pr->patient_id) }}" method="POST" >
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('PATCH') }}
                                                                    <select name="Doctor_id" id="doctor_id" class="form-control"onchange="this.form.submit()">
                                                                        <option value="{{$pr->pat_id->doctor_id}}" selected disabled>{{isset($pr->pat_id->doctor_id)?$pr->pat_id->doc_id->doctor_full_name:"-- حدد الدكتور --"}}</option>
                                                                        @foreach ($doctor as $doc)
                                                                        <option value="{{ $doc->id }}">{{ $doc->doctor_full_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </form>
                                                                @endcan
                                                            </td>
                                                            <td>
                                                                @can('روشته')
                                                                <a class="btn" href="{{route('patientDetails',$pr->patient_id)}}">
                                                                <i class="mdi mdi-dots-vertical text-gray"></i>
                                                            </a>
                                                            @endcan
                                                            </td>
                                                            </tr>
                                @endforeach

                                {{-- <tr>
                                    <th scope="row">2</th>
                                    <td>Gavin Gibson</td>
                                    <td>Account manager</td>
                                    <td>$230,540</td>
                                    <td>$230,540</td>
                                    <td>$230,540</td>
                                    <td>$230,540</td>
                                    <td>$230,540</td>
                                </tr> --}}


                            </tbody>
                        </table>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on("click", ".toggleButton", function() {
        let button = $(this);
        let patientId = button.data("id");

        $.ajax({
            url: "/toggle-status/" + patientId,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.value_status == 1) {
                    button.removeClass("btn-danger").addClass("btn-success").text("كشف");
                } else {
                    button.removeClass("btn-success").addClass("btn-danger").text("اعاده ");
                }
            },
            error: function() {
                alert("حدث خطأ أثناء تغيير الحالة!");
            }
        });
    });
});
</script>
{{-- التحويلات --}}
<script>

document.getElementById('doctor_id').addEventListener('change', function() {
    let doctorId = this.value; // ID الطبيب المختار
    let patientId = document.querySelector('input[name="Patient_id"]').value; // ID المريض من input hidden

    if (!doctorId || !patientId) {
        console.error('القيم غير صحيحة');
        return;
    }

    // استبدال `id` في الرابط بالقيمة الفعلية للمريض
    let url = "/transfereToDoctor/" + patientId;

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // تأمين الطلب ضد CSRF
        },
        body: JSON.stringify({
            Doctor_id: doctorId
        })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message); // إظهار رسالة النجاح
        console.log("تم تحديث الطبيب:", data);
    })
    .catch(error => {
        console.error("خطأ أثناء تحديث الطبيب:", error);
    });
});
</script>


{{-- التحويلات --}}

{{-- التحويلات --}}


@endsection
