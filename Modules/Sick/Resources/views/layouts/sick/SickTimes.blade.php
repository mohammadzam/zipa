@extends('panel::include.sick.master')
@section('content')
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <!--end col-->
                <div class="col-sm-12 text-left mt-4 mb-4">
                    <a  href="{{route('sick.create.new.reserve')}}" class="btn btn-primary px-4">{{trans('admin::admin.create_new_reserve')}}</a>
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
                                        <th>#</th>
                                        <th>{{trans('admin::admin.doctor_name')}}</th>
                                        <th>{{trans('admin::admin.date')}}</th>
                                        <th>{{trans('admin::admin.from')}}</th>
                                        <th>{{trans('admin::admin.to')}}</th>
                                        <th>{{trans('admin::admin.status')}}</th>
                                        <th>{{trans('admin::admin.reserved_at')}}</th>
                                        <th>{{trans('admin::admin.is_payed')}}</th>
{{--                                        <th>{{trans('admin::admin.action')}}</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($data)& $data->count()>0)
                                        @foreach($data as $datum)
                                    <tr class="text-center">
                                        <td>{{$datum->id}} </td>
                                        <td>{{$datum->doctor->name??'دكتر در اين قسمت وجود ندارد'}}</td>
                                        <td>{{verta($datum->date)->format('Y/n/j')}} </td>
                                        <td>{{$datum->from}} </td>
                                        <td>{{$datum->to}} </td>
                                        <td>
                                            @if($datum->status == true)
                                                <span class="text-danger"> نوبت منقضى شد</span>
                                            @else
                                                <span class="text-success"> نوبت فعال است </span>
                                            @endif
                                        </td>
                                        <td>{{verta($datum->created_at)->format('Y/n/j ساعت: h:s')}}</td>
                                        <td>
                                            @if($datum->is_payed == "true")
                                                <span class="text-success"> پرداخت شده</span>
                                            @else
                                                <a class="text-danger" href="{{route('sick.pay.price.of.doctor.visit',[$datum->id,auth()->user()->id,$datum->doctor->id])}}">
                                                    جهت پرداخت كليك كنيد
                                                    <br>
                                                </a>
                                            @endif
                                        </td>
{{--                                        <td class="d-flex justify-content-around align-items-center" style="height: 47px">--}}
{{--                                            <a href="{{route('sick.destroy.reserve',$datum->id)}}">--}}
{{--                                                <i class="las la-trash-alt text-danger font-18"></i>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
                                    </tr>
                                        @endforeach
                                    @else
                                        <td colspan="8">
                                            <h3 class="text-center text-danger">{{'نوبتى هنوز ثبت نشده، در صورت تمايل مى توانيد از دكمه ايجاد نوبت استفاده كنيد'}}</h3>
                                        </td>
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
