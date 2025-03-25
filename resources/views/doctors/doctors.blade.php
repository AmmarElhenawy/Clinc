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

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
                    @foreach ($doctor as $doc )

					<div class="col-xl-4 col-lg-4 col-md-12">
						<div class="card text-center">
							<img class="card-img-top w-100" src="{{URL::asset('assets/img/photos/7.jpg')}}" alt="">
							<div class="card-body">
								<h4 class="card-title mb-3">{{$doc->doctor_full_name}}</h4>
								<h6 class=" mb-2 ">{{$doc->specialty}}</h6>
                                <div class="row">
                                    <div class="col">
                                        <p> الحالات المؤجله</p>
                                        <p class="card-text">{{$doc->referred_casses}} </p>
                                    </div>
                                    <div class="col">
                                        <p> حالات الكشف</p>
                                        <p class="card-text">{{$doc->examined}} </p>
                                    </div>
                                </div>
								<a class="btn btn-primary" href="{{url('doctorDetails')}}/{{$doc->id}}">Read More</a>
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
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">


                        <form action="{{ route('doctors.store') }}" method="post"
                            enctype="multipart/form-data" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col">
                                        <input type="file" name="profile_image">
                                </div>
                                <div class="col">
                                    <label for="First_name" class="control-label">الأسم الأول  </label>
                                    <input type="text" class="form-control" id="First_name"
                                        name="First_name" required>
                                </div>
                                <div class="col">
                                    <label for="Last_name" class="control-label">الأسم الأخير  </label>
                                    <input type="text" class="form-control" id="Last_name"
                                        name="Last_name" required>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col">
                                    <label for="Email" class="control-label">البريد الالكتروني </label>
                                    <input type="text" class="form-control" id="Email"
                                    name="Email" required>
                                </div>

                                <div class="col">
                                    <label for="Phone_number" class="control-label">رقم الهاتف</label>
                                    <input type="text" class="form-control" id="Phone_number"
                                    name="Phone_number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="Specialty" class="control-label">التخصص</label>
                                    <input type="text" class="form-control" id="Specialty" name="Specialty"
                                        required>
                                </div>

                                <div class="col">
                                    <label for="Address" class="control-label">العنوان</label>
                                    <input type="text" class="form-control" id="Address" name="Address"
                                        required>
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
                                    <input type="text" class="form-control" id="value_status"
                                        name="Value_status" required>
                                </div> --}}

                            {{-- <div class="row">
                                <div class="col">
                                    <label for="referred_cases" class="control-label">الحالات
                                        المحالة</label>
                                    <input type="text" class="form-control" id="referred_cases"
                                        name="Referred_casses">
                                </div>

                                <div class="col">
                                    <label for="examined" class="control-label">تم فحصه</label>
                                    <input type="number" class="form-control" id="examined" name="Examined"
                                        required>
                                </div> --}}

                            {{-- </div> --}}


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
@endsection
