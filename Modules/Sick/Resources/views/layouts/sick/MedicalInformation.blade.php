@extends('panel::include.sick.master')
@section('content')
    <div class="col-sm-12">
        <div class="page-title-box">
            <!--end row-->
        </div>
        <!--end page-title-box-->
    </div>
    <div class="tab-pane fade active show" id="Profile_Settings" role="tabpanel"
         aria-labelledby="settings_detail_tab">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">{{trans('admin::admin.medical information')}}</h4>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.name')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="name" type="text" value="{{$data->sick->name}}" placeholder="{{trans('admin::admin.name')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.sick_number')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="sick_number" type="text" value="{{$data->sick->sick_number}}" placeholder="{{trans('admin::admin.sick_number')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.status')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="status" type="text" value="{{$data->sick->status}}" placeholder="{{trans('admin::admin.status')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('sick::signing.age')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="status" type="text" value="{{$data->age}}" placeholder="{{trans('sick::signing.age')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('sick::signing.disease')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="status" type="text" value="{{$data->disease}}" placeholder="{{trans('sick::signing.disease')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('sick::signing.treatment')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="status" type="text" value="{{$data->treatment}}" placeholder="{{trans('sick::signing.treatment')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('sick::signing.description')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="status" type="text" value="{{$data->description}}" placeholder="{{trans('sick::signing.description')}}" disabled>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!--end col-->

            <!-- end col -->
        </div>
        <!--end row-->
    </div>
@stop
