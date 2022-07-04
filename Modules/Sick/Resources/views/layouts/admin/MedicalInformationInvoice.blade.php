@extends('panel::include.master')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">{{trans('admin::admin.sicks')}}</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">{{trans('admin::admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item ">{{trans('admin::admin.medical information')}}</li>
                                <li class="breadcrumb-item active">{{$data->sick->name}}</li>
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
                    <!--end card-body-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive project-invoice">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-light text-center">
                                        <tr>
                                            <th>{{trans('admin::admin.name')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data->sick->name}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('admin::admin.sick_number')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data->sick->sick_number}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('sick::signing.age')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data->sick->age}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('sick::signing.sex')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{trans('admin::admin.'.$data->sick->sex)}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('admin::admin.hospitalized_section')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data->section->name}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('admin::admin.treatment_doctor')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data->doctor->name??'هنوز تعيين نشده'}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('admin::admin.status')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{trans('admin::admin.'.$data->status)}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('sick::signing.disease')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data->disease}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('sick::signing.treatment')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data->treatment}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('sick::signing.description')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{$data->description??'هنوز درج نشده'}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('admin::admin.price')}}</th>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{number_format($data->section->costs->price)}} ريال </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{trans('admin::admin.is_payed')}}</th>
                                            <td>
                                                @if($data->is_payed == "true")
                                                    <span class="text-success"> پرداخت شده</span>
                                                @else
                                                    <span class="text-danger">هنوز پرداخت نشده</span>
                                                @endif
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
                        <!--end row-->
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 col-xl-4 ms-auto align-self-center">
                                <div class="text-center">
                                </div>
                                <div class="text-center">
                                    <small class="font-12 text-primary" >
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
