@extends('panel::include.master')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">{{trans('panel::panel.appointment costs')}}</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">{{trans('admin::admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item ">{{trans('panel::panel.financial matters')}}</li>
                                <li class="breadcrumb-item active ">{{trans('panel::panel.appointment costs')}}</li>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive project-invoice">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>{{trans('admin::admin.number')}}</th>
                                            <th>{{trans('admin::admin.sick_name')}}</th>
                                            <th>{{trans('admin::admin.doctor_name')}}</th>
                                            <th>هزينه كل ويزيت</th>
                                            <th>دستمزد پزشک</th>
                                            <th>دستمزد خالص </th>
                                        </tr>
                                        <!--end tr-->
                                        </thead>
                                        <tbody>
                                        @if(count($data)>0)
                                        @for($i=0;$i<count($data);$i++)
                                        <tr class="text-center">
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$i+1}}</h5>
                                            </td>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data[$i]->sick->name}}</h5>
                                            </td>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data[$i]->doctor->name}}</h5>
                                            </td>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{number_format($data[$i]->doctor->costs->price)}} ريال </h5>
                                            </td>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{number_format($data[$i]->doctor->costs->price * 50/100)}} ريال </h5>
                                            </td>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{number_format($data[$i]->doctor->costs->price * 50/100)}} ريال </h5>
                                            </td>
                                        </tr>
                                        @endfor
                                        @else
                                            <tr class="text-center">
                                                <td colspan="7">
                                                    <h5 class="mt-0 mb-1 font-14 text-danger">هنوز ويزيتى انجام نشده</h5>
                                                </td>
                                            </tr>
                                        @endif
                                        <!--end tr-->
                                        </tbody>
                                    </table>
                                    <div class="text-center mt-4">
                                        <small class="font-14 text-primary" >
                                             تفكيك هزينه هاى ويزيت هاى پزشکان
                                        </small>
                                    </div>
                                    <table class="table table-bordered mt-2">
                                        <thead class="thead-light text-center">
                                        <tr>
                                            <th>{{trans('admin::admin.count_of_all_visits')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data->count()}} ويزيت </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('admin::admin.price_of_all_visits')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{number_format(array_sum($array_of_prices))}} ريال </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('admin::admin.Physicians_fees')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{number_format(array_sum($array_of_prices)* 50 / 100)}} ريال </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('admin::admin.Net_wages')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{number_format(array_sum($array_of_prices)* 50 / 100)}} ريال </h5>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
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
                                <h5 class="mt-4">توضيحات</h5>
                                <ul class="ps-3">
                                    <li><small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">اين آمار شامل تعداد همه ويزيت هاى پزشکى انجام وپرداخت شده نزد همه پزشکان مى باشد</span>

                                        </small>
                                    </li>
                                    <li><small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">دستمزد پزشکان از هزينه ويزيت بيماران:  مساوی با تعداد ويزيت هاى پذيرفته شده و پرداخت شده ضرب در 50% قيمت كل هر ويزيت مى باشد</span>

                                        </small>
                                    </li>
                                    <li><small class="font-12 text-secondary">
                                            <span class="font-14 text-primary">دستمزد كلينيك از هزينه ويزيت بيماران:  مساوی با تعداد ويزيت هاى پذيرفته شده و پرداخت شده ضرب در 50% قيمت كل هر ويزيت مى باشد</span>

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
                                    <small class="font-12 text-secondary" >
                                       تاريخ وزمان صدور اين فاكتور: {{verta(now()) ->format('d/M/Y H:i')}}
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
