@extends('panel::include.sick.master')
@section('content')
    <div class="col-sm-12">
        <div class="page-title-box">
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <h4 class="page-title">{{trans('admin::admin.sicks')}}</h4>--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item">--}}
{{--                            <a href="javascript:void(0);">{{trans('admin::admin.sicks')}}</a>--}}
{{--                        </li>--}}
{{--                        <li class="breadcrumb-item active">{{trans('admin::admin.edit_admin')}}</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--                <!--end col-->--}}
{{--                <div class="col-auto align-self-center">--}}
{{--                    <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">--}}
{{--                        <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class=""--}}
{{--                                                                                       id="Select_date"></span>--}}
{{--                        <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <!--end col-->--}}
{{--            </div>--}}
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
                                <h4 class="card-title">{{trans('admin::admin.personal information')}}</h4>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{Session::get('error')}}</span>
                            </div>
                        @endif
                        @if($errors->has('name'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('name') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('password'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('password') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        <form method="POST" action="{{route('sick.update.my.information')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.name')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="name" type="text" value="{{$data->name}}" placeholder="{{trans('admin::admin.name')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.sick_number')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="sick_number" type="text" value="{{$data->sick_number}}" placeholder="{{trans('admin::admin.sick_number')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('sick::signing.sex')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="sex" type="text" value="{{$data->sex}}" placeholder="{{trans('sick::signing.status')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('sick::signing.age')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="age" type="text" value="{{$data->age}}" placeholder="{{trans('sick::signing.status')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.new password')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="password" type="password"
                                           placeholder="{{trans('admin::admin.new password')}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.confirm password')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="password_confirmation" type="password"
                                           placeholder="{{trans('admin::admin.confirm password')}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit" class="btn btn-primary btn-sm">{{trans('admin::admin.submit')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end col-->

            <!-- end col -->
        </div>
        <!--end row-->
    </div>
@stop
