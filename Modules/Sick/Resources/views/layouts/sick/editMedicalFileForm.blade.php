@extends('panel::include.sick.master')
@section('content')
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">{{trans('admin::admin.sicks')}}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">{{trans('admin::admin.sicks')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin::admin.new medical file')}}</li>
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
                        @if($errors->has('section_id'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('sick::signing.Error!')}}</strong> {{ $errors->first('section_id') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('disease'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('sick::signing.Error!')}}</strong> {{ $errors->first('disease') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('treatment'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('sick::signing.Error!')}}</strong> {{ $errors->first('treatment') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('description'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('sick::signing.Error!')}}</strong> {{ $errors->first('description') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        <form method="POST" action="{{route('sick.update.edited.medical.file',$data->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label
                                    class="col-xl-3 col-lg-3 col-form-label">{{trans('sick::signing.section_sick')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select
                                        class="select2 form-control mb-3 custom-select select2-hidden-accessible"
                                        name="section_id"
                                        style="width: 100%; height:36px;" tabindex="-1"
                                        aria-hidden="true" required>
                                        <optgroup
                                            label="{{trans('admin::admin.section_work')}}">
                                            <option
                                                value="{{$data->section_id}}">{{$data->section->name}}
                                            </option>
                                            @foreach($sections as $section)
                                                <option
                                                    value="{{$section->id}}">{{$section->name}}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label" for="username">{{trans('sick::signing.disease')}} </label>
                                <div class="col-lg-9 col-xl-8">
                                    <input  value="{{$data->disease}}" type="text" class="form-control" name="disease" id=""
                                           placeholder="{{trans('sick::signing.disease')}}"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label" for="username">{{trans('sick::signing.treatment')}} </label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="text" class="form-control" value="{{$data->treatment}}" name="treatment" id=""
                                           placeholder="{{trans('sick::signing.treatment')}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label" for="">{{trans('sick::signing.description')}} </label>
                                <div class="col-lg-9 col-xl-8">
                                    <input type="text" class="form-control" value="{{$data->description}}" name="description" id=""
                                           placeholder="{{trans('sick::signing.description')}}" autocapitalize="off" autocomplete="off" required>
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
