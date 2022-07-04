@extends('panel::include.doctor.master')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">{{trans('admin::admin.admins')}}</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">{{trans('admin::admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('panel::panel.salaryReceipt')}}</li>
                            </ol>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                                <span class="" id="Select_date">Jan 11</span>
                                <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-primary">
                                <i data-feather="download" class="align-self-center icon-xs"></i>
                            </a>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-body invoice-head">
{{--                        <div class="row">--}}
{{--                            <div class="col-md-1 align-self-center">--}}
{{--                                <img src="{{asset('assets/images/zipa.png')}}" alt="logo-large" class="" height="50" width="50">--}}
{{--                            </div>--}}
                            <!--end col-->
                            <div class="col-md-12">

                                <ul class="list-inline mb-0 contact-detail float-start">

                                    <li class="list-inline-item">
                                        <div class="ps-3">
                                            <img style="" src="{{asset('assets/images/zipa.png')}}" height="100" width="100"
                                                 alt="logo-large" class="">
                                            <p class="text-muted mb-0">كلينك زيباىى زيبا</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="ps-3">
                                            <i class="mdi mdi-web"></i>
                                            <p class="text-muted mb-0">www.zipa.com</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="ps-3" >
                                            <i class="mdi mdi-phone"></i>
                                            <p class="text-muted mb-0" style="direction: ltr">028 123456789</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="ps-3">
                                            <i class="mdi mdi-map-marker"></i>
                                            <p class="text-muted mb-0"></p>
                                            <p class="text-muted mb-0">Iran, Qazin: Norozian St Hekmat 23 </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--end col-->
{{--                        </div>--}}
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive project-invoice">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>{{trans('admin::admin.WorkBreakdown')}}</th>
                                            <th>{{trans('admin::admin.Details')}}</th>
                                            <th>{{trans('admin::admin.rate')}}</th>
                                            <th>{{trans('admin::admin.total')}}</th>
                                        </tr>
                                        <!--end tr-->
                                        </thead>
                                        <tbody>
                                        <tr class="text-center">
                                            <td>

                                                <h5 class="mt-0 mb-1 font-14">{{trans('admin::admin.Visits')}}</h5>
                                                <p class="mb-0 text-muted">{{trans('admin::admin.VisitsDes')}}</p>
                                            </td>
                                            <td>
                                                {{$visits->count()}}
                                                <br>
                                                ويزيت
                                                <hr class="hr-dashed hr-menu">
                                                {{$count_of_visits_hours}}<br> ساعت
                                            </td>
                                            <td>{{number_format($visits_amount->price * 50 / 100)}} ريال</td>
                                            <td>{{number_format($final_amount_from_visits)}} ريال</td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="text-center">
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{trans('admin::admin.shifts')}}</h5>
                                                <p class="mb-0 text-muted">{{trans('admin::admin.shiftsDes')}}</p>
                                            </td>
                                            <td>
                                                {{$shifts->count()}} <br> شيفت
                                                <hr class="hr-dashed hr-menu">
                                                {{$total_shifts_hours}}  <br> ساعت
                                            </td>
                                            <td>{{number_format($visits_amount->price * 25 / 100)}} ريال </td>
                                            <td>{{number_format($final_amount_from_shifts)}} ريال </td>
                                        </tr>
                                        <!--end tr-->
                                        <tr class="text-center">
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{trans('admin::admin.MedicalOperation')}}</h5>
                                                <p class="mb-0 text-muted">{{trans('admin::admin.MedicalOperationDes')}}</p>
                                            </td>
                                            <td>{{$medical_operations->count()}} <br> عمل جراحى</td>
                                            <td>{{number_format($operation_amount->price * 75 / 100)}} ريال </td>
                                            <td>{{number_format($final_amount_from_medical_operation)}} ريال</td>
                                        </tr>
                                        <tr class="bg-primary-gradient text-white">
                                            <th colspan="2" class="border-0"></th>
                                            <td class="border-0 font-14"><b>{{trans('admin::admin.count_of_all')}}</b></td>
                                            <td class="border-0 font-14"><b>{{number_format($final_amount_from_visits + $final_amount_from_shifts + $final_amount_from_medical_operation)}} ريال </b></td>
                                        </tr>
                                        <!--end tr-->
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                                <!--end /div-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h5 class="mt-4">{{trans('admin::admin.calculate method')}}</h5>
                                <ul class="ps-3">
                                    <li><small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">هزينه ويزيت بيماران:</span> مساوی با تعداد ويزيت هاى پذيرفته شده و پرداخت شده ضرب در 50% قيمت كل هر ويزيت مى باشد

                                        </small>
                                    </li>
                                    <li><small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">هزينه شيفت هاى كارى:</span> مساوى با تعداد ساعت هاى شيفت هاى كارى دكتر ضربدر 25% قیمت كل هر شيفت مى باشد

                                        </small>
                                    </li>
                                    <li><small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">هزينه عمل هاى جراحى: </span>مساوى با تعداد عمل هاى جراحى انجام شده ضربدر 75% قيمت كل عمل جراحى مى باشد

                                        </small>
                                    </li>
                                    <li><small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">تبصره 1: </span>حقوق تمام شده دكتر معاف از ماليات مى باشد

                                        </small>
                                    </li>
                                    <li><small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">تبصره 2: </span>حقوق شيفت هاى كارى حقوق ثابت مى باشد، وبر اساس تعداد ومدت شيفت هاى ثبت شده محاسبه مى شود

                                        </small>
                                    </li>

                                </ul>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6 align-self-end">
                                <div class="float-end" style="width: 30%;">
                                    <small>مدير كل: تيم فنى زيبا</small>
                                    <img src="{{asset('assets/images/signature.png')}}" alt="" class="mt-2 mb-1" height="26">
                                    <p class="border-top">امضا</p>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 col-xl-4 ms-auto align-self-center">
                                <div class="text-center">
                                    <small class="font-12 text-primary">
                                        فيش حقوق دكتر ({{auth()->user()->name}}) از تاريخ ({{verta($imploded_start_date)->format('d/M/Y')}}) تا تاريخ ({{verta($imploded_end_date)->format('d/M/Y')}}) مى باشد
                                    </small>
                                </div>
                                <div class="text-center">
                                    <small class="font-12 text-secondary" >
                                       تاريخ وزمان صدور اين فيش حقوق: {{verta(now()) ->format('d/M/Y H:i')}}
                                    </small>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12 col-xl-4">
                                <div class="float-end d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-soft-info btn-sm">{{trans('admin::admin.print')}}</a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
@stop
