@extends('panel::include.sick.master')
@section('content')
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
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
                        @if($errors->has('doctor_id'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('doctor_id') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('date'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('date') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('from'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('from') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('to'))

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('to') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        <form method="POST" action="{{route('sick.store.new.reserve')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label
                                    class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.treatment_doctor')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select
                                        class="select2 form-control mb-3 custom-select select2-hidden-accessible"
                                        name="doctor_id"
                                        style="width: 100%; height:36px;" tabindex="-1"
                                        aria-hidden="true" required>
                                        <optgroup
                                            label="{{trans('admin::admin.treatment_doctor')}}">
                                            @foreach($doctors as $doctor)
                                                <option
                                                    value="{{$doctor->id}}">{{$doctor->name}}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.date')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input data-jdp onmouseover="jalaliDatepicker.startWatch();" class="form-control"
                                           name="date"
                                           type="text"
                                           value="{{old('date')}}"
                                           placeholder="{{trans('admin::admin.date')}}"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.from')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select
                                        class="select2 form-control mb-3 custom-select select2-hidden-accessible"
                                        name="from"
                                        style="width: 100%; height:36px;" tabindex="-1"
                                        aria-hidden="true" required>
                                        <optgroup
                                            label="{{trans('admin::admin.from')}}">
                                            <option value="08:05">08:05</option>
                                            <option value="08:35">08:35</option>

                                            <option value="09:05">09:05</option>
                                            <option value="09:35">09:35</option>

                                            <option value="10:05">10:05</option>
                                            <option value="10:35">10:35</option>

                                            <option value="11:05">11:05</option>
                                            <option value="11:35">11:35</option>

                                            <option value="12:05">12:05</option>
                                            <option value="12:35">12:35</option>

                                            <option value="13:05">13:05</option>
                                            <option value="13:35">13:35</option>

                                            <option value="14:05">14:05</option>
                                            <option value="14:35">14:35</option>

                                            <option value="15:05">15:05</option>
                                            <option value="15:35">15:35</option>

                                            <option value="16:05">16:05</option>
                                            <option value="16:35">16:35</option>
                                            <option value="17:05">17:05</option>
                                            <option value="17:35">17:35</option>

                                            <option value="18:05">18:05</option>
                                            <option value="18:35">18:35</option>

                                            <option value="19:05">19:05</option>
                                            <option value="19:35">19:35</option>

                                            <option value="20:05">20:05</option>
                                            <option value="20:35">20:35</option>

                                            <option value="21:05">21:05</option>
                                            <option value="21:35">21:35</option>

                                            <option value="22:05">22:05</option>
                                            <option value="22:35">22:35</option>

                                            <option value="23:05">23:05</option>
                                            <option value="23:35">23:35</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit"
                                            class="btn btn-primary btn-sm">{{trans('admin::admin.submit')}}</button>
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
