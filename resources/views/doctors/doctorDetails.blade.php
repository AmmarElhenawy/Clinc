@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    {{-- <h1>{{$doctor->id}}</h1> --}}
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">


                                <form action="" method="get" enctype="multipart/form-data"
                                    autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col">

                                            @if($doctor->profile && $doctor->profile->file_name)
                                            <img class="card-img-top mx-auto d-block" style="width: 150px; height: 150px; object-fit: cover;"
                                                src="{{ asset('profile_images/' . $doctor->doctor_full_name . '/' . $doctor->profile->file_name) }}" alt="">
                                        @else
                                            <img class="card-img-top mx-auto d-block" style="width: 150px; height: 150px; object-fit: cover;"
                                                src="{{ asset('profile_images/default.png') }}" alt="No Image">
                                        @endif                                        </div>
                                        <div class="col">
                                            <label for="First_name" class="control-label">الأسم كامل </label>
                                            <input type="" class="form-control" id="First_name" name="First_name" value="{{$doctor->doctor_full_name}}" required>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Email" class="control-label">البريد الالكتروني </label>
                                            <input type="text" class="form-control" id="Email" name="Email" value="{{$doctor->email}}" required>
                                        </div>

                                        <div class="col">
                                            <label for="Phone_number" class="control-label">رقم الهاتف</label>
                                            <input type="text" class="form-control" id="Phone_number" name="Phone_number" value="{{$doctor->phone_number}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="Specialty" class="control-label">التخصص</label>
                                            <input type="text" class="form-control" id="Specialty" name="Specialty"  value="{{$doctor->specialty}}" required>
                                        </div>

                                        <div class="col">
                                            <label for="Address" class="control-label">العنوان</label>
                                            <input type="text" class="form-control" id="Address" name="Address" value="{{$doctor->address}}" required>
                                        </div>
                                    </div>



                                    <div class="col">
                                        <label for="Qualifications" class="control-label">المؤهلات</label>
                                        <input type="text" class="form-control" id="Qualifications" name="Qualifications" value="{{$doctor->qualifications}}"
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




                                </form>
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
@endsection
