@extends('panel::include.doctor.master')
@section('content')
        <div class="container-fluid">
            <div class="row">

            </div>
            <div class="row mt-4">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>{{trans('admin::admin.sick_name')}}</th>
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
                                        <td>{{$datum->sick->name??'دكتر در اين قسمت وجود ندارد'}}</td>
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
                                                <span class="text-danger">منتظر پرداخت توسط بيمار</span>
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
                                            <h3 class="text-center text-danger">{{'نوبتى هنوز ثبت نشده'}}</h3>
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
