@extends('panel::include.master')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">{{trans('admin::admin.medical information')}}</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">{{trans('admin::admin.dashboard')}}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">{{trans('admin::admin.sicks')}}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">{{$data[0]->sick->name}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin::admin.medical information')}}</li>
                            </ol>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date">Jan 11</span>
                                <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
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
        <!-- end row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>{{trans('admin::admin.hospitalized_section')}}</th>
                                    <th>{{trans('admin::admin.treatment_doctor')}}</th>
                                    <th>{{trans('admin::admin.status')}}</th>
                                    <th>{{trans('sick::signing.disease')}}</th>
                                    <th>{{trans('sick::signing.treatment')}}</th>
                                    <th>{{trans('sick::signing.description')}}</th>
                                    <th>{{trans('admin::admin.created_at')}}</th>
                                    <th>{{trans('admin::admin.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data)& $data->count()>0)
                                    @foreach($data as $datum)
                                        <tr class="text-center">
                                            <td>{{$datum->id}}</td>
                                            <td>{{$datum->section->name}} </td>
                                            <td>{{$datum->doctor->name??'منتظر تعيين'}} </td>
                                            <td >
                                                <span class="{{$datum->status}}" >{{trans('admin::admin.'.$datum->status)}}</span>

                                            </td>
                                            <td>{{$datum->disease}} </td>
                                            <td>{{$datum->treatment}} </td>
                                            <td>{{$datum->description??'شرح درج نشده'}} </td>
                                            <td>{{verta($datum->created_at)->format('Y/n/j')}}</td>
                                            <td class="d-flex justify-content-around align-items-center" style="height: 47px">
                                                <a href="{{route('admin.show.edit.form.sick',$datum->id)}}">
                                                    <i class="las la-pen text-info font-18"></i>
                                                </a>
                                                <a href="{{route('admin.show.sick.medical.information.invoice',$datum->id)}}">
                                                    <i class="las la-clipboard-list text-success font-18"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div>
                                        <h3 class="text-center text-danger">{{trans('admin::admin.not_fount_data')}}</h3>
                                    </div>
                                @endif
                                </tbody>
                            </table>
                            <!--end /table-->
                        </div>
                        <!--end /tableresponsive-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
        </div>
        <!-- end row -->
    </div>

@stop
