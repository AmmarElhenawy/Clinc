@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمه الفواتير</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

<!-- row -->
<div class="row">
    @section('content')
    <!-- row opened -->
    <div class="row row-sm">
        @if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{session()->get('delete')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
        @if (session()->has('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session()->get('status')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

                    </div>
                    <div class="card-body">
                                        @if (session()->has('add'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{session()->get('add')}}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        @if (session()->has('edit'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{session()->get('edit')}}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif

                                    {{-- button --}}
                                    <div class="d-flex justify-content-between">
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <a href="{{ route('invoices.create') }}" class="btn btn-outline-primary btn-block">
                                                اضافه فاتورة
                                            </a>
                                        </div>
                                    </div>


                                    <div class="table-responsive">
                                        <table id="example1" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">#</th>
                                                    <th class="border-bottom-0">رقم الفاتوره</th>
                                                    <th class="border-bottom-0">تاريخ الفاتوره</th>
                                                    <th class="border-bottom-0">تاريخ الاستحقاق</th>
                                                    <th class="border-bottom-0">المنتج</th>
                                                    <th class="border-bottom-0">القسم</th>
                                                    <th class="border-bottom-0">الخصم</th>
                                                    <th class="border-bottom-0">نسبه الضريبه</th>
                                                    <th class="border-bottom-0">قيمه الضريبه</th>
                                                    <th class="border-bottom-0">الاجمالي</th>
                                                    <th class="border-bottom-0">الحاله</th>
                                                    <th class="border-bottom-0">ملاحظات</th>
                                                    <th class="border-bottom-0">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i=0;
                                                @endphp

                                                @foreach ($invoice as $inv)
                                                @php
                                                    $i++;
                                                    @endphp
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$inv->invoice_number}}</td>
                                                    <td>{{$inv->invoice_date}}</td>
                                                    <td>{{$inv->due_date}}</td>
                                                    <td>{{$inv->prod_id->product_name}}</td>
                                                    <td>
                                                        <a href="{{url ('invoiceDetail')}}/{{$inv->id}}"> {{$inv->sec_id->section_name}}</a>
                                                        </td>
                                                        <td>{{$inv->discount}}</td>
                                                        <td>{{$inv->rate_vat}}</td>
                                                        <td>{{$inv->value_vat}}</td>
                                                        <td>{{$inv->total}}</td>
                                                        <td>
                                                            @if($inv->value_status == 1)
                                                            <span class="text-success">{{ $inv->status }}</span>
                                                            @elseif($inv->value_status == 2)
                                                            <span class="text-danger">{{ $inv->status }}</span>
                                                            @else
                                                            <span class="text-warning">{{ $inv->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{$inv->note}}</td>
                                                    <td><div class="dropdown dropup">
                                                        <button aria-expanded="false" aria-haspopup="true" class=" ripple btn-secondary"
                                                        data-toggle="dropdown" type="button">العمليات <i class="fas fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-3">
                                                            <a class="dropdown-item" href="{{url('edit_invoice')}}/{{$inv->id}}">تعديل</a>
                                                            <a class="btn btn-outline-danger dropdown-item " data-effect="effect-scale"
                                                            data-id="{{ $inv->id }}" data-invnumber="{{$inv->invoice_number}}" data-toggle="modal" data-target="#modaldemo7"
                                                            title="حذف"><i class="las la-trash"> حذف </i></a>
                                                            <a class="dropdown-item" href="{{url('status_invoice')}}/{{$inv->id}}">تغيير الحاله</a>
                                                        </div>
                                                    </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- delete -->
{{-- <div class="modal" id="modaldemo7">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('invoices.destroy', $inv->id) }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                    <input type="hidden" name="id" id="id" value="">
                    <input class="form-control" name="invnumber" id="invnumber" type="text" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
        </div>
        </form>
    </div>
</div> --}}
                                </div>
                            </div>
                        </div>
                        <!--/div-->
        <!-- Basic modal -->

                        <!--div-->

                    </div>
                    <!-- /row -->
                </div>
                <!-- Container closed -->
            </div>
            <!-- main-content closed -->
    @endsection
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
        <!-- main-content closed -->
        @endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
    $(document).ready(function() {
        $('select[name="Section"]').on('change', function() {
            var SectionId = $(this).val();
            if (SectionId) {
                $.ajax({
                    url: "{{ URL::to('sections') }}/" + SectionId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="product"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="product"]').append('<option value="' +
                                value + '">' + value + '</option>');
                        });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });

</script>
<script>
    $('#modaldemo7').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var invnumber = button.data('invnumber')
        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #invnumber').val(invnumber);
    })
</script>
@endsection
