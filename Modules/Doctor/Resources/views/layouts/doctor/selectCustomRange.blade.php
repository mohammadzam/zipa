@extends('panel::include.doctor.master')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                    {{--                        <div class="col">--}}
                    {{--                            <h4 class="page-title">{{trans('accountingoperations::accountingoperations.CirculationAccountingOperation')}}</h4>--}}
                    {{--                            <ol class="breadcrumb">--}}
                    {{--                                <li class="breadcrumb-item">--}}
                    {{--                                    <a href="javascript:void(0);">{{trans('accountingoperations::accountingoperations.dashboard')}}</a>--}}
                    {{--                                </li>--}}
                    {{--                                <li class="breadcrumb-item">{{trans('accountingoperations::accountingoperations.CirculationAccountingOperation')}}</li>--}}
                    {{--                                <li class="breadcrumb-item active">{{trans('accountingoperations::accountingoperations.'.$breadcrumb_item)}}</li>--}}
                    {{--                            </ol>--}}
                    {{--                        </div>--}}
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
        </div>
        <div class="row">
            <div class="col-sm-12 text-center mb-4">
                {{--                          titil is here--}}
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pricingTable1 text-center">
                                        <img src="{{asset('assets/images/ch-doc.svg')}}" alt="" class="" height="300">

                                        <form method="GET"
                                              action="{{route('doctor.showMySalaryReceipt')}}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @if($errors->has('start'))

                                                <div class="alert alert-danger alert-dismissible fade show"
                                                     role="alert">
                                <span
                                    class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('start') }}</span>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            @endif
                                            @if($errors->has('end'))

                                                <div class="alert alert-danger alert-dismissible fade show"
                                                     role="alert">
                                <span
                                    class="alert-text"><strong>{{trans('admin::validation.Error!')}}</strong> {{ $errors->first('end') }}</span>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            @endif
                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.start_date')}}</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input data-jdp onmouseover="jalaliDatepicker.startWatch();"
                                                           class="form-control" name="start" type="text"
                                                           placeholder="{{trans('admin::admin.start_date')}}"
                                                           autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-3 col-lg-3 col-form-label">{{trans('admin::admin.end_date')}}</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input data-jdp onmouseover="jalaliDatepicker.startWatch();"
                                                           class="form-control" name="end" type="text"
                                                           placeholder="{{trans('admin::admin.end_date')}}" autocomplete="off"
                                                           required>
                                                </div>
                                            </div>
                                            <hr class="hr-dashed my-4">
                                            <div class="text-center">
                                            </div>
                                            <button type="submit"
                                                    class="btn btn-primary w-100 btn-skew btn-outline-dashed py-2">
                                                <span>{{trans('admin::admin.salaryReceipt')}}</span></button>
                                        </form>
                                    </div><!--end pricingTable-->
                                </div><!--end card-body-->
                            </div> <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
@stop
