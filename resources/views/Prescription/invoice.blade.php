@extends('layouts.master')
@section('css')
    <style>
        @media print {
            #print_Button,
            .breadcrumb-header {
                display: none !important;
            }
            .prescription-card {
                border: none !important;
                box-shadow: none !important;
            }
        }
        .prescription-header {
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .doctor-title {
            font-size: 28px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 5px;
        }
        .specialty {
            font-size: 20px;
            text-align: center;
            color: #555;
        }
        .patient-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 25px;
        }
        .info-item {
            margin-bottom: 8px;
            font-size: 16px;
        }
        .med-table {
            border: 2px solid #000;
            margin: 20px 0;
        }
        .med-table th {
            background: #e9ecef;
            font-weight: 700;
            text-align: right;
        }
        .clinic-address {
            border-top: 2px solid #333;
            padding-top: 15px;
            margin-top: 30px;
            text-align: center;
        }
    </style>
@endsection
@section('title')
    وصفة طبية
@stop
@section('content')
<div class="row row-sm">
    <div class="col-md-12 col-xl-12">
        <div class="main-content-body-invoice" id="print">
            <div class="card prescription-card">
                <div class="card-body">
                    <!-- Header Section -->
                    <div class="prescription-header">
                        <h1 class="doctor-title">د/غــادة ربوف</h1>
                        {{-- <h1 class="doctor-title">{{$id_patient}}</h1> --}}
                        <h3 class="specialty">استشاري الغدد الصماء والسكري</h3>
                        <div class="text-center">عضو الاتحاد الدولي للسكر</div>
                    </div>

                    <!-- Patient Info -->
                    <div class="patient-info">
                        <div class="row">
                            <div class="col-md-4 info-item">
                                <strong>التاريخ:</strong> {{$prescription->date}}
                            </div>
                            <div class="col-md-4 info-item">
                                <strong>الرقم:</strong> 409g / ماع/2s
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 info-item">
                                <strong>الاسم:</strong> {{$patient->patient_full_name}}
                            </div>
                            <div class="col-md-4 info-item">
                                <strong>العمر:</strong> {{$patient->age}}
                            </div>
                            <div class="col-md-4 info-item">
                                <strong>الوزن:</strong>{{$patient_rec->weight}}
                            </div>
                        </div>
                    </div>

                    <!-- Medications Table -->
                    <table class="table med-table">
                        <thead>
                            <tr>
                                <th width="15%">النوع</th>
                                <th width="25%">اسم الدواء</th>
                                <th width="20%">الجرعة</th>
                                <th width="30%">المواعيد</th>
                                <th width="10%">المدة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$prescription->type}}</td>
                                <td>{{$prescription->drug_name}}</td>
                                <td>{{$prescription->concentration}}</td>
                                <td>{{$prescription->times}}</td>
                                <td>{{$prescription->period}}</td>
                            </tr>
                            <tr>
                                <td>{{$prescription->type}}</td>
                                <td>{{$prescription->drug_name}}</td>
                                <td>{{$prescription->concentration}}</td>
                                <td>{{$prescription->times}}</td>
                                <td>{{$prescription->period}}</td>
                            </tr>
                            <tr>
                                <td>Tab</td>
                                <td>Panodi</td>
                                <td>-</td>
                                <td>مرتين يومياً بعد الأكل</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Clinic Info -->
                    <div class="clinic-address">
                        <div class="mb-2">أمام مستشفى المختار العام - برج الأنشاص - الدور الثاني علوي</div>
                        <div class="contact-info">
                            <div>للاستعلام: 5181734736 - 5181734737 - 5181734738</div>
                            <div>https://www.facebook.com/Dr.GhadaRaouf</div>
                        </div>
                    </div>

                    <!-- Print Button -->
                    <button class="btn btn-danger mt-3" id="print_Button" onclick="printDiv()">
                        <i class="mdi mdi-printer ml-1"></i>طباعة الوصفة
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
function printDiv() {
    var printContents = document.getElementById('print').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload();
}
</script>
@endsection
