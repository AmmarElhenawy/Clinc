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
    حالة فاتورة
@stop
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
@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{session()->get('delete')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session()->get('Add')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
				<div class="card ">
                    <div class="panel panel-primary tabs-style-2 ">
                        <div class=" tab-menu-heading ">
                            <div class="tabs-menu1">
                                <!-- Tabs -->

                                <ul class="nav panel-tabs main-nav-line ">
                                    <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات الفاتوره</a></li>
                                    <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
                                    <li><a href="#tab6" class="nav-link" data-toggle="tab">المرفقات</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content card col-xl-12">
                                <div class="tab-pane active" id="tab4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <th>رقم الفاتوره</th>
                                                        <td>{{$inv->invoice_number}}</td>
                                                        <th>تاريخ الاصدار</th>
                                                        <td>{{$inv->invoice_date}}</td>
                                                        <th>تاريخ الاستحقاق</th>
                                                        <td>{{$inv->due_date}}</td>
                                                        <th>القسم</th>
                                                        <td>{{$inv->sec_id->section_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>المنتج</th>
                                                        <td>{{$inv->prod_id->product_name}}</td>
                                                        <th>مبلغ التحصيل</th>
                                                        <td>{{$inv->amount_collection}}</td>
                                                        <th>مبلغ العمولة</th>
                                                        <td>{{$inv->amount_commission}}</td>
                                                        <th>الخصم</th>
                                                        <td>{{$inv->discount}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>نسبه الضريبه</th>
                                                        <td>{{$inv->rate_vat}}</td>
                                                        <th>قيمه الضريبه </th>
                                                        <td>{{$inv->value_vat}}</td>
                                                        <th>الاجمالي مع الضريبه</th>
                                                        <td>{{$inv->total}}</td>
                                                        <th>الحاله الحاليه</th>
                                                        <td>
                                                            @if($inv->value_status == 1)
                                                                <span class="btn btn-success">{{ $inv->status }}</span>
                                                            @elseif($inv->value_status == 2)
                                                                <span class="btn btn-danger">{{ $inv->status }}</span>
                                                            @else
                                                                <span class="btn btn-warning">{{ $inv->status }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>المستخدم</th>
                                                        <td>{{$inv->user}}</td>
                                                        <th>ملاحظات</th>
                                                        <td>{{$inv->note}}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><!-- bd -->
                                    </div><!-- bd -->
                                </div>
                                <div class="tab-pane" id="tab5">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>م</th>
                                                        <th>رقم الفاتوره</th>
                                                        <th>نوع المنتج</th>
                                                        <th>القسم</th>
                                                        <th>حاله الدفع</th>
                                                        <th>تاريخ الدفع</th>
                                                        <th>ملاحظات</th>
                                                        <th>تاريخ الاضافه</th>
                                                        <th>المستخدم</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $x=0;
                                                    @endphp
                                                    @foreach ($inv_details as $invD)
                                                    @php
                                                        $x++;
                                                    @endphp
                                                    <tr>
                                                        <td> {{ $x }} </td>
                                                        <td>{{$invD->invoice_number}}</td>
                                                        <td>{{ $invD->prod_id ? $invD->prod_id->product_name : 'N/A' }}</td>
                                                        <td>{{ $invD->sec_id ? $invD->sec_id->section_name : 'N/A' }}</td>
                                                        <td>
                                                            @if($invD->value_status == 1)
                                                                <span class="text-success">{{ $invD->status }}</span>
                                                            @elseif($inv->value_status == 2)
                                                                <span class="text-danger">{{ $invD->status }}</span>
                                                            @else
                                                                <span class="text-warning">{{ $invD->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{$invD->updated_at}}</td>
                                                        <td>{{$invD->note}}</td>
                                                        <td>{{$invD->user}}</td>
                                                        <td></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div><!-- bd -->
                                    </div><!-- bd -->
                                </div>
                                <div class="tab-pane" id="tab6">
                                    <div class="card-body">
                                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                        <h5 class="card-title">اضافة مرفقات</h5>
                                        <form method="post" action="{{ url('/invoiceAttachment') }}"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    name="file_name" required>
                                                <input type="hidden" id="customFile" name="invoice_number"
                                                    value="{{ $inv->invoice_number }}">
                                                <input type="hidden" id="invoice_id" name="invoice_id"
                                                    value="{{ $inv->id }}">
                                                <label class="custom-file-label" for="customFile">حدد
                                                    المرفق</label>
                                            </div><br><br>
                                            <button type="submit" class="btn btn-primary btn-sm "
                                                name="uploadedFile">تاكيد</button>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>م</th>
                                                        <th>اسم الملف</th>
                                                        <th>قام بلأضافه</th>
                                                        <th>تاريخ الاضافه</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i=0; @endphp
                                                    @foreach ($inv_attachment as $invA)
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    <tr>
                                                        <th >{{$i}}</th>
                                                        <td>{{$invA->file_name}}</td>
                                                        <td>{{$invA->create_by}}</td>
                                                        <td>{{$invA->created_at}}</td>
                                                        <td>
                                                            <a class="btn btn-outline-success"
                                                            href="{{ route('view_file', ['invoice_number' => $invA->invoice_number, 'file_name' => $invA->file_name]) }}">عرض</a>

                                                            <a class="btn btn-outline-primary"
                                                            href="{{ route('download', ['invoice_number' => $invA->invoice_number, 'file_name' => $invA->file_name]) }}">تحميل</a>

                                                            <a class="btn btn-outline-danger " data-effect="effect-scale"
                                                            data-id="{{ $invA->id }}" data-file_name="{{ $invA->file_name}}" data-invoice_number="{{$invA->invoice_number}}" data-toggle="modal"
                                                            href="#modaldemo7" title="حذف"><i class="las la-trash"></i> حذف</a>
                                                        </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div><!-- bd -->
                                    </div><!-- bd -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="modaldemo7">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف الملف</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('delete_file') }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="file_name" id="file_name" type="hidden" readonly>
                                        <input class="form-control" name="invoice_number" id="invoice_number" type="hidden" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                    </div>
                                </form>

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
    <script>
        $('#modaldemo7').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })
    </script>
@endsection
