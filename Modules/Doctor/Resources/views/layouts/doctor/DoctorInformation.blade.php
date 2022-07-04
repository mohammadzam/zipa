@extends('panel::include.doctor.master')
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
                        <form method="POST" action="{{route('doctor.update.my.information')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.name')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="name" type="text" value="{{$data->name}}" placeholder="{{trans('admin::admin.name')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.doctor_number')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="doctor_number" type="text" value="{{$data->doctor_number}}" placeholder="{{trans('admin::admin.sick_number')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.section_work')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="section" type="text" value="{{$data->sectionDoctor->section->name}}" placeholder="{{trans('admin::admin.section_work')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.price_of_visit')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="price" type="text" value="{{number_format($data->costs->price)}} ريال " placeholder="{{trans('admin::admin.price_of_visit')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.status')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="status" type="text" value="{{trans('admin::admin.'.$data->status)}} " placeholder="{{trans('admin::admin.status')}}" disabled>
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
