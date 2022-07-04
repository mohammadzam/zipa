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
                                <li class="breadcrumb-item active">{{trans('panel::panel.myWorkPlan')}}</li>
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
            <div class="col-sm-12 text-left mb-4">
                <a  href="{{route('doctor.show.create.new.time.form')}}" class="btn btn-primary px-4">{{trans('admin::admin.create_new_time')}}</a>
            </div>
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
                                    <td>شنبه</td>
                                    @if(isset($saturday) and $saturday->count()>0)
                                        @foreach($saturday as $day)
                                            <td>
                                                <span> از</span> <span class="text-success">{{$day->from}}</span>
                                                <span>تا</span>  <span class="text-danger"> {{$day->to}}</span>
                                            </td>
                                        @endforeach
                                        <td colspan="{{$colspan+1}}"></td>
                                    @else
                                        <td colspan="{{$colspan+1}}" class="text-danger"> در اين روز شيفت ندارم</td>

                                    @endif
                                </tr>
                                <tr class="text-center bg-light">
                                    <td>یک شنبه</td>
                                    @if(isset($sunday) and $sunday->count()>0)
                                        @foreach($sunday as $day)
                                            <td>
                                                <span> از</span> <span class="text-success">{{$day->from}}</span>
                                                <span>تا</span>  <span class="text-danger"> {{$day->to}}</span>
                                            </td>
                                        @endforeach
                                        <td colspan="{{$colspan+1}}"></td>
                                    @else
                                        <td colspan="{{$colspan+1}}" class="text-danger"> در اين روز شيفت ندارم</td>

                                    @endif
                                </tr>
                                <tr class="text-center">
                                    <td>دو شنبه</td>
                                    @if(isset($monday) and $monday->count()>0)
                                        @foreach($monday as $day)
                                            <td>
                                                <span> از</span> <span class="text-success">{{$day->from}}</span>
                                                <span>تا</span>  <span class="text-danger"> {{$day->to}}</span>
                                            </td>
                                        @endforeach
                                        <td colspan="{{$colspan+1}}"></td>
                                    @else
                                        <td colspan="{{$colspan+1}}" class="text-danger"> در اين روز شيفت ندارم</td>

                                    @endif
                                </tr>
                                <tr class="text-center bg-light">
                                    <td>سه شنبه</td>
                                    @if(isset($tuesday) and $tuesday->count()>0)
                                        @foreach($tuesday as $day)
                                            <td>
                                                <span> از</span> <span class="text-success">{{$day->from}}</span>
                                                <span>تا</span>  <span class="text-danger"> {{$day->to}}</span>
                                            </td>
                                        @endforeach
                                        <td colspan="{{$colspan+1}}"></td>
                                    @else
                                        <td colspan="{{$colspan+1}}" class="text-danger"> در اين روز شيفت ندارم</td>

                                    @endif
                                </tr>
                                <tr class="text-center">
                                    <td>چهار شنبه</td>
                                    @if(isset($wednesday) and $wednesday->count()>0)
                                        @foreach($wednesday as $day)
                                            <td>
                                                <span> از</span> <span class="text-success">{{$day->from}}</span>
                                                <span>تا</span>  <span class="text-danger"> {{$day->to}}</span>
                                            </td>
                                        @endforeach
                                        <td colspan="{{$colspan+1}}"></td>
                                    @else
                                        <td colspan="{{$colspan+1}}" class="text-danger"> در اين روز شيفت ندارم</td>

                                    @endif
                                </tr>
                                <tr class="text-center bg-light">
                                    <td>پنج شنبه</td>
                                    @if(isset($thursday) and $thursday->count()>0)
                                    @foreach($thursday as $day)
                                         <td>
                                            <span> از</span> <span class="text-success">{{$day->from}}</span>
                                            <span>تا</span>  <span class="text-danger"> {{$day->to}}</span>
                                        </td>
                                    @endforeach
                                    <td colspan="{{$colspan+1}}"></td>
                                    @else
                                        <td colspan="{{$colspan+1}}" class="text-danger"> در اين روز شيفت ندارم</td>

                                    @endif
                                </tr>
                                <tr class="text-center">
                                    <td>جمعه</td>
                                    @if(isset($friday) and $friday->count()>0)
                                        @foreach($friday as $day)
                                            <td>
                                                <span> از</span> <span class="text-success">{{$day->from}}</span>
                                                <span>تا</span>  <span class="text-danger"> {{$day->to}}</span>
                                            </td>
                                        @endforeach
                                        <td colspan="{{$colspan+1}}"></td>
                                    @else
                                        <td colspan="{{$colspan+1}}" class="text-danger"> در اين روز شيفت ندارم</td>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
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
