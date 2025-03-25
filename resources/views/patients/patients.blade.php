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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mg-b-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>التسلسل</th>
                                        <th>الاسم</th>
                                        <th>رقم التليفون</th>
                                        <th>السن</th>
                                        <th>الملف </th>
                                        <th>العمليات</th>
                                        {{-- <th> info </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($patients as $p)
                                                                @php
                                                                    $i++;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{$i}}</td>

                                                                    <td>{{$p->patient_full_name}}</td>
                                                                    <td>{{$p->phone_number}}</td>
                                                                    <td>{{$p->age}}
                                                                    </td>
                                                                    {{-- <td>{{$doc->examined}}</td> --}}
                                                                    <td>
                                                                        <a class="btn btn-outline-primary " data-effect="effect-scale"
                                                                        href="{{route('patientDetails',$p->id)}}"
                                                                        title=""><i class="las la-file"></i></a>
                                                                </td>
                                                                    <td>
                                                                        <a class="btn btn-outline-primary " data-effect="effect-scale"
                                                                        href="{{route('editPatients',$p->id)}}"
                                                                        title=""><i class="las la-plus"></i></a>
                                                                        {{-- <a class="btn btn-outline-primary " data-effect="effect-scale"
                                                                        data-id="{{ $pro->id }}" data-product_name="{{ $pro->product_name }}"
                                                                        data-description="{{ $pro->description }}"
                                                                        data-section_name="{{$pro->sec_id->section_name}}"
                                                                        data-toggle="modal" href="#exampleModal2"
                                                                        title="تعديل"><i class="las la-pen"></i></a>

                                                                        <a class="btn btn-outline-danger " data-effect="effect-scale"
                                                                        data-id="{{ $pro->id }}" data-product_name="{{ $pro->product_name }}" data-toggle="modal"
                                                                        href="#modaldemo7" title="حذف"><i class="las la-trash"></i></a> --}}
lll
                                                                    </td>

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
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
