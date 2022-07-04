@extends('panel::include.doctor.master')
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
                                <li class="breadcrumb-item active">{{trans('admin::admin.sicks index')}}</li>
                            </ol>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class=""
                                                                                               id="Select_date">Jan 11</span>
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
                                    <th>{{trans('admin::admin.name')}}</th>
                                    <th>{{trans('sick::signing.sex')}}</th>
                                    <th>{{trans('sick::signing.age')}}</th>
                                    <th>{{trans('admin::admin.status')}}</th>
                                    <th>{{trans('sick::signing.disease')}}</th>
                                    <th>{{trans('sick::signing.treatment')}}</th>
                                    <th>{{trans('sick::signing.description')}}</th>
                                    <th>{{trans('admin::admin.is_payed')}}</th>

                                    <th>{{trans('admin::admin.created_at')}}</th>
                                    <th>{{trans('admin::admin.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data)& $data->count()>0)
                                    @foreach($data as $datum)
                                        <tr class="text-center">
                                            <form method="POST"
                                                  class="form-horizontal well"
                                                  action="{{route('doctor.update.sick.status',$datum->id)}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <td>{{$datum->id}}</td>
                                                <td>{{$datum->sick->name}} </td>
                                                <td>{{$datum->sick->sex}} </td>
                                                <td>{{$datum->sick->age}} </td>
                                                <td>

                                                    <select
                                                        class="select2 form-control mb-3 custom-select select2-hidden-accessible"
                                                        name="status" style="width: 100%; height:36px;" tabindex="-1"
                                                        aria-hidden="true">
                                                        <option>{{trans('admin::admin.select')}}</option>
                                                        <optgroup label="{{trans('admin::admin.status')}}">
                                                            @if($datum->status == 'InBed')
                                                                <option
                                                                    value="RequestForHospitalization">{{trans('admin::admin.RequestForHospitalization')}}</option>
                                                                <option selected
                                                                        value="InBed">{{trans('admin::admin.InBed')}}</option>
                                                                <option
                                                                    value="WasHospitalized">{{trans('admin::admin.WasHospitalized')}}</option>
                                                                <option
                                                                    value="DischargeFromTheHospital">{{trans('admin::admin.DischargeFromTheHospital')}}</option>
                                                            @endif
                                                            @if($datum->status == 'WasHospitalized')
                                                                <option
                                                                    value="RequestForHospitalization">{{trans('admin::admin.RequestForHospitalization')}}</option>
                                                                <option
                                                                    value="InBed">{{trans('admin::admin.InBed')}}</option>
                                                                <option selected
                                                                        value="WasHospitalized">{{trans('admin::admin.WasHospitalized')}}</option>
                                                                <option
                                                                    value="DischargeFromTheHospital">{{trans('admin::admin.DischargeFromTheHospital')}}</option>
                                                            @endif
                                                            @if($datum->status == 'RequestForHospitalization')
                                                                <option selected
                                                                        value="RequestForHospitalization">{{trans('admin::admin.RequestForHospitalization')}}</option>
                                                                <option
                                                                    value="InBed">{{trans('admin::admin.InBed')}}</option>
                                                                <option
                                                                    value="WasHospitalized">{{trans('admin::admin.WasHospitalized')}}</option>
                                                                <option
                                                                    value="DischargeFromTheHospital">{{trans('admin::admin.DischargeFromTheHospital')}}</option>
                                                            @endif
                                                            @if($datum->status == 'DischargeFromTheHospital')
                                                                <option
                                                                    value="RequestForHospitalization">{{trans('admin::admin.RequestForHospitalization')}}</option>
                                                                <option
                                                                    value="InBed">{{trans('admin::admin.InBed')}}</option>
                                                                <option
                                                                    value="WasHospitalized">{{trans('admin::admin.WasHospitalized')}}</option>
                                                                <option selected
                                                                        value="DischargeFromTheHospital">{{trans('admin::admin.DischargeFromTheHospital')}}</option>
                                                            @endif
                                                        </optgroup>
                                                    </select>

                                                </td>
                                                <td>{{$datum->disease}} </td>
                                                <td>{{$datum->treatment}} </td>
                                                <td>{{$datum->description??'بدون شرح'}} </td>
                                                <td>
                                                    @if($datum->is_payed == "true")
                                                        <span class="text-success"> پرداخت شده</span>
                                                    @else
                                                        <span class="text-danger">منتظر پرداخت از طرف بيمار</span>
                                                    @endif
                                                </td>
                                                <td>{{verta($datum->created_at)->format('Y/n/j')}}</td>
                                                <td class="d-flex justify-content-around align-items-center"
                                                    style="height: 55px">
                                                    <input type="submit" value="تغيير وضعيت"
                                                           class="btn btn-outline-success">
                                                </td>
                                            </form>
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
