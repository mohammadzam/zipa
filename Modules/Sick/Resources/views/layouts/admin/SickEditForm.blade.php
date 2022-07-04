@extends('panel::include.master')
@section('content')
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
                        <li class="breadcrumb-item active">{{trans('admin::admin.edit_sick').": ".$data->sick->name}}</li>
                    </ol>
                </div>
                <!--end col-->
                <div class="col-auto align-self-center">
                    <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                        <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class=""
                                                                                       id="Select_date"></span>
                        <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                    </a>
                </div>
                <!--end col-->
            </div>
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
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{Session::get('error')}}</span>
                            </div>
                        @endif
                        @if($errors->has('status'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('status') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                            @if($errors->has('doctor_id'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('doctor_id') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        <form method="POST" action="{{route('admin.update.edited.sick.information',$data->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.name')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="name" type="text" value="{{$data->sick->name}}" placeholder="{{trans('admin::admin.name')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.status')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select class="select2 form-control mb-3 custom-select select2-hidden-accessible" name="status" style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true">
                                        <option>{{trans('admin::admin.select')}}</option>
                                        <optgroup label="{{trans('admin::admin.status')}}">
                                        @if($data->status == 'InBed')
                                                <option selected value="InBed">{{trans('admin::admin.InBed')}}</option>
                                                <option value="WasHospitalized">{{trans('admin::admin.WasHospitalized')}}</option>
                                                <option value="RequestForHospitalization">{{trans('admin::admin.RequestForHospitalization')}}</option>
                                                <option value="DischargeFromTheHospital">{{trans('admin::admin.DischargeFromTheHospital')}}</option>
                                            @endif
                                            @if($data->status == 'WasHospitalized')
                                                <option  value="InBed">{{trans('admin::admin.InBed')}}</option>
                                                <option selected value="WasHospitalized">{{trans('admin::admin.WasHospitalized')}}</option>
                                                <option value="RequestForHospitalization">{{trans('admin::admin.RequestForHospitalization')}}</option>
                                                <option value="DischargeFromTheHospital">{{trans('admin::admin.DischargeFromTheHospital')}}</option>
                                            @endif
                                            @if($data->status == 'RequestForHospitalization')
                                                <option  value="InBed">{{trans('admin::admin.InBed')}}</option>
                                                <option  value="WasHospitalized">{{trans('admin::admin.WasHospitalized')}}</option>
                                                <option selected value="RequestForHospitalization">{{trans('admin::admin.RequestForHospitalization')}}</option>
                                                <option value="DischargeFromTheHospital">{{trans('admin::admin.DischargeFromTheHospital')}}</option>
                                            @endif
                                            @if($data->status == 'DischargeFromTheHospital')
                                                <option  value="InBed">{{trans('admin::admin.InBed')}}</option>
                                                <option  value="WasHospitalized">{{trans('admin::admin.WasHospitalized')}}</option>
                                                <option  value="RequestForHospitalization">{{trans('admin::admin.RequestForHospitalization')}}</option>
                                                <option selected value="DischargeFromTheHospital">{{trans('admin::admin.DischargeFromTheHospital')}}</option>
                                            @endif
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.hospitalized_section')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" name="section" type="text" value="{{$data->section->name}}" placeholder="{{trans('admin::admin.name')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.treatment_doctor')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select
                                        class="select2 form-control mb-3 custom-select select2-hidden-accessible"
                                        name="doctor_id"
                                        style="width: 100%; height:36px;" tabindex="-1"
                                        aria-hidden="true" required>
                                        <option selected value="{{$data->doctor_id??null}}">{{$data->doctor->name??'هنوز تعيين نشده'}}</option>
                                        <optgroup
                                            label="{{trans('admin::admin.treatment_doctor')}}">
                                            @foreach($doctors as $doctor)
                                                @foreach($doctor->doctor as $dr)
                                                <option
                                                    value="{{$dr->id}}">{{$dr->name}}
                                                </option>
                                                @endforeach
                                            @endforeach
                                        </optgroup>
                                    </select>
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
