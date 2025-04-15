@extends('layouts.master')
@section('css')
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Prescription</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ New</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row mb-4">
                        <div class="col">
                            <label class="control-label">النوع</label>
                            <select name="type" class="form-control">
                                <option selected disabled>اختر النوع</option>
                                <option value="capsule">كبسول</option>
                                <option value="syrup">شراب</option>
                                <option value="tablet">أقراص</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="control-label">العلاج</label>
                            <select name="medicine" class="form-control">
                                <option selected disabled>اختر العلاج</option>
                                <option value="panadol">بانادول</option>
                                <option value="amoxicillin">أموكسيسيلين</option>
                                <option value="brufen">بروفين</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="control-label">التركيز</label>
                            <select name="concentration" class="form-control">
                                <option selected disabled>اختر التركيز</option>
                                <option value="250mg">250mg</option>
                                <option value="500mg">500mg</option>
                                <option value="1000mg">1000mg</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="control-label">عدد مرات</label>
                            <input type="number" class="form-control" name="times_per_day" placeholder="عدد مرات في اليوم">
                        </div>
                        <div class="col">
                            <label class="control-label">مدة العلاج</label>
                            <input type="text" class="form-control" name="duration" placeholder="مثلاً: 5 أيام">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-success mx-2">
                            <i class="fa fa-plus"></i> إضافة علاج
                        </button>
                        {{-- another way invoiceTemp for print --}}
                        <button type="button" onclick="window.print()" class="btn btn-success mx-2">
                            <i class="fa fa-print"></i> طباعه
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection

@section('js')
@endsection
