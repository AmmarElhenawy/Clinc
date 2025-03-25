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

    {{-- <div class="clearfix">
        <div class="float-right  mt-2">
            <span class="text-primary">
                <i class="si si-social-facebook tx-30"></i>
            </span>
        </div>
        <div class="float-left">
            <p class="card-text text-muted mb-1">Followers</p>
            <h3>24K</h3>
        </div>
    </div> --}}
    <div>

        <div class="row row-sm">
            <div class="col-sm-12 col-lg-6 col-xl-3">
                <div class="card card-img-holder">
                    <div class="card-body list-icons">
                        <div class="clearfix">
                            <div class="float-right  mt-2">
                                <span class="text-primary">
                                    <i class="si si-chart tx-30"></i>
                                </span>
                            </div>
                            <div class="float-left">
                                <p class="card-text text-muted mb-1">Income</p>
                                <h3>21%</h3>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <p class="text-muted mb-0 pt-4"><i class="si si-exclamation text-info mr-2"></i>From Last Month
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-3">
                <div class="card card-img-holder">
                    <div class="card-body list-icons">
                        <div class="clearfix">
                            <div class="float-right  mt-2">
                                <span class="text-primary">
                                    <i class="si si-social-facebook tx-30"></i>
                                </span>
                            </div>
                            <div class="float-left">
                                <p class="card-text text-muted mb-1">Followers</p>
                                <h3>24K</h3>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <p class="text-muted mb-0 pt-4"><i class="si si-check mr-1 text-primary mr-2"></i> Recent
                                History</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-3">
                <div class="card card-img-holder">
                    <div class="card-body list-icons">
                        <div class="clearfix">
                            <div class="float-right  mt-2">
                                <span class="text-primary">
                                    <i class="si si-social-facebook tx-30"></i>
                                </span>
                            </div>
                            <div class="float-left">
                                <p class="card-text text-muted mb-1">Followers</p>
                                <h3>24K</h3>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                            <p class="text-muted mb-0 pt-4"><i class="si si-check mr-1 text-primary mr-2"></i> Recent
                                History</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">SIMPLE TABLE</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mg-b-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>التسلسل</th>
                                        <th>الدكتو</th>
                                        <th>التخصص</th>
                                        <th>رقم التليفون</th>
                                        <th>الحالات المحوله</th>
                                        <th> تم الكشف </th>
                                        <th>الحاله</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($doctor as $doc)
                                                                    @php
                                                                        $i++;
                                                                    @endphp
                                                                    <tr>
                                                                        <td>{{$i}}</td>
                                                                        <td >
                                                                            <a href="{{url('doctorDetails')}}/{{$doc->id}}">{{$doc->doctor_full_name}}</a>
                                                                        </td>
                                                                        <td>{{$doc->specialty}}</td>
                                                                        <td>{{$doc->phone_number}}</td>
                                                                        <td>{{$doc->referred_casses}}</td>
                                                                        <td>{{$doc->examined}}</td>
                                                                        <td>                                                                        <button
                                                                            class="toggleButton btn {{ $doc->value_status == 1 ? 'btn-success' : 'btn-danger' }}"data-id="{{ $doc->id }}">
                                                                            {{ $doc->value_status == 1 ? 'متاح' : 'غير متاح' }}
                                                                        </button></td>

                                                                        {{-- <td>$450,870</td> --}}
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
    <!-- Moment js -->
    <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <!-- Internal Piety js -->
    <script src="{{URL::asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>
    <!-- Internal Chart js -->
    <script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>


    {{-- flip --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".toggleButton", function() {
                let button = $(this);
                let patientId = button.data("id");

                $.ajax({
                    url: "/toggle-status2/" + patientId,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.value_status == 1) {
                            button.removeClass("btn-danger").addClass("btn-success").text("متاح");
                        } else {
                            button.removeClass("btn-success").addClass("btn-danger").text("غير متاح");
                        }
                    },
                    error: function() {
                        alert("حدث خطأ أثناء تغيير الحالة!");
                    }
        });
    });
});

</script>
{{-- flip --}}
@endsection
