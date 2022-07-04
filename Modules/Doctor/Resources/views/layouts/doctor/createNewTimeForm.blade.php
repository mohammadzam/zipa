@extends('panel::include.doctor.master')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">{{trans('panel::panel.myWorkPlan')}}</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">{{trans('panel::panel.doctor-menu')}}</a>
                                </li>
                                <li class="breadcrumb-item ">{{trans('panel::panel.myWorkPlan')}}</li>
                                <li class="breadcrumb-item active">افزودن شيفت كارى جديد</li>
                            </ol>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                                <span class="" id="Select_date">Jan 11</span>
                                <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">شيفت هاى كارى</h4>
                        <p class="text-muted mb-0">افزودن شيفت كارى جديد</p>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show"
                                 role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                                <span
                                    class="alert-text"><strong>{{trans('accountingdocument::validation.Error!')}}</strong> {{Session::get('error')}}</span>
                            </div>
                        @endif
                        @if($errors->has('day'))

                            <div class="alert alert-danger alert-dismissible fade show"
                                 role="alert">
                                <span
                                    class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('day') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('from'))

                            <div class="alert alert-danger alert-dismissible fade show"
                                 role="alert">
                                <span
                                    class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('from') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('to'))

                            <div class="alert alert-danger alert-dismissible fade show"
                                 role="alert">
                                <span
                                    class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('to') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        @if($errors->has('to'))

                            <div class="alert alert-danger alert-dismissible fade show"
                                 role="alert">
                                <span
                                    class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('to') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                        @endif
                        {{--                            @if($errors->has('time.*.fromTimes'))--}}

                        {{--                            <div class="alert alert-danger alert-dismissible fade show"--}}
                        {{--                                 role="alert">--}}
                        {{--                                <span--}}
                        {{--                                    class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('time.*.fromTimes') }}</span>--}}
                        {{--                                <button type="button" class="btn-close" data-bs-dismiss="alert"--}}
                        {{--                                        aria-label="Close">--}}
                        {{--                                    <span aria-hidden="true"></span>--}}
                        {{--                                </button>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                        {{--                            @if($errors->has('time.*.toTimes'))--}}

                        {{--                            <div class="alert alert-danger alert-dismissible fade show"--}}
                        {{--                                 role="alert">--}}
                        {{--                                <span--}}
                        {{--                                    class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('time.*.toTimes') }}</span>--}}
                        {{--                                <button type="button" class="btn-close" data-bs-dismiss="alert"--}}
                        {{--                                        aria-label="Close">--}}
                        {{--                                    <span aria-hidden="true"></span>--}}
                        {{--                                </button>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                        <form method="POST"
                              class="form-horizontal well"
                              action="{{route('doctor.store.new.time')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.day')}}</label>
                                <div class="col-lg-9 col-xl-8">
                                    <select class="select2 form-control mb-3 custom-select select2-hidden-accessible"
                                            name="day" style="width: 100%; height:36px;" tabindex="-1"
                                            aria-hidden="true">
                                        <option>{{trans('admin::admin.select')}}</option>
                                        <optgroup label="{{trans('admin::admin.day')}}">
                                            <option value="شنبه">شنبه</option>
                                            <option value="یکشنبه">یکشنبه</option>
                                            <option value="دوشنبه">دوشنبه</option>
                                            <option value="سه شنبه">سه شنبه</option>
                                            <option value="چهارشنبه">چهارشنبه</option>
                                            <option value="پنج شنبه">پنج شنبه</option>
                                            <option value="جمعه">جمعه</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">از ساعت </label>
                                <div class="col-lg-9 col-xl-8">
                                    <select name="from"
                                            class="select2 form-control mb-3 custom-select select2-hidden-accessible"
                                            style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" required>
                                        <option value="">{{trans('admin::admin.select')}}</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>

                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>

                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>

                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>

                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>

                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>

                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>

                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>

                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>

                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>

                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>

                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>

                                        <option value="21:00">21:00</option>
                                        <option value="21:30">21:30</option>

                                        <option value="22:00">22:00</option>
                                        <option value="22:30">22:30</option>

                                        <option value="23:00">23:00</option>
                                        <option value="23:30">23:30</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">تا ساعت </label>
                                <div class="col-lg-9 col-xl-8">
                                    <select name="to"
                                            class="select2 form-control mb-3 custom-select select2-hidden-accessible"
                                            style="width: 100%; height:36px;" tabindex="-1" aria-hidden="true" required>

                                        <option value="">{{trans('admin::admin.select')}}</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>

                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>

                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>

                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>

                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>

                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>

                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>

                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>

                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>

                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>

                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>

                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>

                                        <option value="21:00">21:00</option>
                                        <option value="21:30">21:30</option>

                                        <option value="22:00">22:00</option>
                                        <option value="22:30">22:30</option>

                                        <option value="23:00">23:00</option>
                                        <option value="23:30">23:30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit"
                                            class="btn btn-primary btn-sm">{{trans('admin::admin.submit')}}</button>
                                </div>
                            </div>
                        {{--                            <div class="alert alert-success alert-dismissible fade show"--}}
                        {{--                                 role="alert">--}}
                        {{--                            <span--}}
                        {{--                                class="alert-text">--}}
                        {{--                                    <strong>توجه </strong>--}}
                        {{--                                براى افزودن شيفت در اين روز مى توانيد از دكمه افزودن استفاده كنيد--}}
                        {{--                            </span>--}}
                        {{--                            </div>--}}
                        {{--                            <fieldset>--}}
                        {{--                                <div class="repeater-default">--}}

                        {{--                                    <div data-repeater-list="time">--}}
                        {{--                                        <div data-repeater-item="">--}}
                        {{--                                            <div class="form-group row d-flex align-items-end">--}}
                        {{--                                                <div class="col-sm-4">--}}
                        {{--                                                    <label class="form-label">از ساعت </label>--}}
                        {{--                                                    <select name="time[0][fromTimes]" class="form-select" required>--}}
                        {{--                                                        <option value="">{{trans('admin::admin.select')}}</option>--}}
                        {{--                                                        <option value="08:00">08:00</option>--}}
                        {{--                                                        <option value="08:30">08:30</option>--}}

                        {{--                                                        <option value="09:00">09:00</option>--}}
                        {{--                                                        <option value="09:30">09:30</option>--}}

                        {{--                                                        <option value="10:00">10:00</option>--}}
                        {{--                                                        <option value="10:30">10:30</option>--}}

                        {{--                                                        <option value="11:00">11:00</option>--}}
                        {{--                                                        <option value="11:30">11:30</option>--}}

                        {{--                                                        <option value="12:00">12:00</option>--}}
                        {{--                                                        <option value="12:30">12:30</option>--}}

                        {{--                                                        <option value="13:00">13:00</option>--}}
                        {{--                                                        <option value="13:30">13:30</option>--}}

                        {{--                                                        <option value="14:00">14:00</option>--}}
                        {{--                                                        <option value="14:30">14:30</option>--}}

                        {{--                                                        <option value="15:00">15:00</option>--}}
                        {{--                                                        <option value="15:30">15:30</option>--}}

                        {{--                                                        <option value="16:00">16:00</option>--}}
                        {{--                                                        <option value="16:30">16:30</option>--}}
                        {{--                                                        <option value="17:00">17:00</option>--}}
                        {{--                                                        <option value="17:30">17:30</option>--}}

                        {{--                                                        <option value="18:00">18:00</option>--}}
                        {{--                                                        <option value="18:30">18:30</option>--}}

                        {{--                                                        <option value="19:00">19:00</option>--}}
                        {{--                                                        <option value="19:30">19:30</option>--}}

                        {{--                                                        <option value="20:00">20:00</option>--}}
                        {{--                                                        <option value="20:30">20:30</option>--}}

                        {{--                                                        <option value="21:00">21:00</option>--}}
                        {{--                                                        <option value="21:30">21:30</option>--}}

                        {{--                                                        <option value="22:00">22:00</option>--}}
                        {{--                                                        <option value="22:30">22:30</option>--}}

                        {{--                                                        <option value="23:00">23:00</option>--}}
                        {{--                                                        <option value="23:30">23:30</option>--}}
                        {{--                                                    </select>--}}
                        {{--                                                </div>--}}
                        {{--                                                <!--end col-->--}}
                        {{--                                                <div class="col-sm-4">--}}
                        {{--                                                    <label class="form-label">تا ساعت </label>--}}
                        {{--                                                    <select name="time[0][toTimes]" class="form-select" required>--}}
                        {{--                                                        <option value="">{{trans('admin::admin.select')}}</option>--}}
                        {{--                                                        <option value="08:00">08:00</option>--}}
                        {{--                                                        <option value="08:30">08:30</option>--}}

                        {{--                                                        <option value="09:00">09:00</option>--}}
                        {{--                                                        <option value="09:30">09:30</option>--}}

                        {{--                                                        <option value="10:00">10:00</option>--}}
                        {{--                                                        <option value="10:30">10:30</option>--}}

                        {{--                                                        <option value="11:00">11:00</option>--}}
                        {{--                                                        <option value="11:30">11:30</option>--}}

                        {{--                                                        <option value="12:00">12:00</option>--}}
                        {{--                                                        <option value="12:30">12:30</option>--}}

                        {{--                                                        <option value="13:00">13:00</option>--}}
                        {{--                                                        <option value="13:30">13:30</option>--}}

                        {{--                                                        <option value="14:00">14:00</option>--}}
                        {{--                                                        <option value="14:30">14:30</option>--}}

                        {{--                                                        <option value="15:00">15:00</option>--}}
                        {{--                                                        <option value="15:30">15:30</option>--}}

                        {{--                                                        <option value="16:00">16:00</option>--}}
                        {{--                                                        <option value="16:30">16:30</option>--}}
                        {{--                                                        <option value="17:00">17:00</option>--}}
                        {{--                                                        <option value="17:30">17:30</option>--}}

                        {{--                                                        <option value="18:00">18:00</option>--}}
                        {{--                                                        <option value="18:30">18:30</option>--}}

                        {{--                                                        <option value="19:00">19:00</option>--}}
                        {{--                                                        <option value="19:30">19:30</option>--}}

                        {{--                                                        <option value="20:00">20:00</option>--}}
                        {{--                                                        <option value="20:30">20:30</option>--}}

                        {{--                                                        <option value="21:00">21:00</option>--}}
                        {{--                                                        <option value="21:30">21:30</option>--}}

                        {{--                                                        <option value="22:00">22:00</option>--}}
                        {{--                                                        <option value="22:30">22:30</option>--}}

                        {{--                                                        <option value="23:00">23:00</option>--}}
                        {{--                                                        <option value="23:30">23:30</option>--}}
                        {{--                                                    </select>--}}
                        {{--                                                </div>--}}


                        {{--                                                <div class="col-sm-2">--}}
                        {{--                                                            <span data-repeater-delete="" class="btn btn-outline-danger">--}}
                        {{--                                                                    <span class="las la-trash text-danger font-18"></span> حذف--}}
                        {{--                                                            </span>--}}
                        {{--                                                </div>--}}
                        {{--                                                <!--end col-->--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="form-group mb-0 row">--}}
                        {{--                                        <div class="col-sm-12">--}}
                        {{--                                                    <span data-repeater-create="" class="btn btn-outline-secondary">--}}
                        {{--                                                            <span class="fas fa-plus"></span> افزودن--}}
                        {{--                                                    </span>--}}
                        {{--                                            <input type="submit" value="تاكيد" class="btn btn-outline-primary">--}}
                        {{--                                        </div>--}}
                        {{--                                        <!--end col-->--}}
                        {{--                                    </div>--}}

                        {{--                                </div>--}}
                        {{--                                <!--end repeter-->--}}
                        {{--                            </fieldset>--}}

                        <!--end fieldset-->

                        </form>
                        <!--end form-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!-- end col -->
            <!--end col-->
        </div>
        <!-- end row -->

    </div>
@stop
