@extends('panel::include.master')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">هزينه هاى شيفت هاى دكتر</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">{{trans('admin::admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item ">امور مالى</li>
                                <li class="breadcrumb-item active">هزينه هاى شيفت هاى دكتر</li>
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
                                    <div class="ps-3">
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
                                        <thead>
                                        <tr class="text-center">

                                            <th>دكتر</th>
                                            <th>شنبه</th>
                                            <th>یکشنبه</th>
                                            <th>دوشنبه</th>
                                            <th>سه شنبه</th>
                                            <th>چهارشنبه</th>
                                            <th>پنج شنبه</th>
                                            <th>جمعه</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0;$i<count($doctors);$i++)
                                            <tr class="text-center">
                                                <td>{{$doctors[$i]->name}}</td>
                                                <td>{{array_sum($saturday_hours_shifts[$i])}} ساعت</td>
                                                <td>{{array_sum($sunday_hours_shifts[$i])}} ساعت</td>
                                                <td>{{array_sum($monday_hours_shifts[$i])}} ساعت</td>
                                                <td>{{array_sum($tuesday_hours_shifts[$i])}} ساعت</td>
                                                <td>{{array_sum($wednesday_hours_shifts[$i])}} ساعت</td>
                                                <td>{{array_sum($thursday_hours_shifts[$i])}} ساعت</td>
                                                <td>{{array_sum($friday_hours_shifts[$i])}} ساعت</td>
                                            </tr>
                                        @endfor

                                        </tbody>
                                    </table>

                                    <div class="my-4 text-center">
                                        <small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">تفكيك هزينه هاى شيفت هاى پزشکان </span>

                                        </small>
                                    </div>

                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr class="text-center">

                                            <th>دكتر</th>
                                            <th>مجموع شيفت ها</th>
                                            <th>قيمت هر ويزيت نزد اين دكتر</th>
                                            <th>سود دكتر از همه شيفت هاى هفته</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0;$i<count($doctors);$i++)
                                            <tr class="text-center">
                                                <td>{{$doctors[$i]->name}}</td>
                                                <td>
                                                    {{
                                                    array_sum($saturday_hours_shifts[$i])+
                                                    array_sum($sunday_hours_shifts[$i])+
                                                    array_sum($monday_hours_shifts[$i])+
                                                    array_sum($tuesday_hours_shifts[$i])+
                                                    array_sum($wednesday_hours_shifts[$i])+
                                                    array_sum($thursday_hours_shifts[$i])+
                                                    array_sum($friday_hours_shifts[$i])}} ساعت

                                                </td>
                                                <td>{{number_format($doctors[$i]->costs->price)}} ريال</td>

                                                <td>{{
                                                   number_format(
                                                       (( array_sum($saturday_hours_shifts[$i])+
                                                    array_sum($sunday_hours_shifts[$i])+
                                                    array_sum($monday_hours_shifts[$i])+
                                                    array_sum($tuesday_hours_shifts[$i])+
                                                    array_sum($wednesday_hours_shifts[$i])+
                                                   array_sum($thursday_hours_shifts[$i])+
                                                    array_sum($friday_hours_shifts[$i])) * $doctors[$i]->costs->price)*25/100

                                                    )

                                                }} ريال
                                                </td>
                                            </tr>
                                        @endfor

                                        </tbody>
                                    </table>
                                </div>
                                <!--end /div-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h5 class="mt-4">توضيحات</h5>
                                <ul class="ps-3">
                                    <li>
                                        <small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">هزينه هر شيفت كارى برابر با تعداد ساعت هاى شيفت ضربدر 25% قيمت ويزيت نزد اين دكتر</span>

                                        </small>
                                    </li>

                                </ul>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6 align-self-end">
                                <div class="float-end" style="width: 30%;">
                                    <small>مدير كل: تيم فنى زيبا</small>
                                    <img src="{{asset('assets/images/signature.png')}}" alt="" class="mt-2 mb-1"
                                         height="26">
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
                                </div>
                                <div class="text-center">
                                    <small class="font-12 text-primary">
                                        تاريخ وزمان اين فاكتور ({{verta(now())->format('d/M/Y i:H')}})
                                    </small>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12 col-xl-4">
                                <div class="float-end d-print-none">
                                    <a href="javascript:window.print()"
                                       class="btn btn-soft-info btn-sm">{{trans('admin::admin.print')}}</a>
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
