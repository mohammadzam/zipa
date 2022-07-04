<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>{{$page_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="description"/>
    <meta content="" name="Mohammad zam"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css"/>

</head>
<body class="account-body accountbg">

<!-- Log In page -->
<div class="container">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="card">
                        <div class="card-body p-0 auth-header-box">
                            <div class="text-center p-3">
                                <a href="" class="logo logo-admin">
                                    <img src="{{asset('assets/images/zipa.png')}}" height="100" width="100" alt="logo"
                                         class="auth-logo">
                                </a>
                                <h4 class="mt-3 mb-1 fw-semibold text-white font-18">{{trans('admin::signing.login')}}</h4>
                                <p class="text-muted  mb-0">{{trans('admin::signing.line1')}}</p>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav-border nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#LogIn_Tab"
                                       role="tab">{{trans('admin::signing.login')}}</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                            <span class="alert-text"><strong>{{trans('admin::signing.Error!')}}</strong> {{Session::get('error')}}</span>
                                        </div>
                                    @endif
                                    @if($errors->has('administrative_number'))

                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <span class="alert-text"><strong>{{trans('admin::signing.Error!')}}</strong> {{ $errors->first('administrative_number') }}</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    @endif
                                    @if($errors->has('password'))

                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <span class="alert-text"><strong>{{trans('admin::signing.Error!')}}</strong> {{ $errors->first('password') }}</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{route('admin.signing-in')}}" role="form">
                                        @csrf

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">{{trans('admin::signing.administrative_number')}} </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="administrative_number" id=""
                                                       placeholder="{{trans('admin::signing.enter_email_or_administrative_number')}}" required>
                                            </div>
                                        </div>
                                        <!--end form-group-->

                                        <div class="form-group mb-2">
                                            <label class="form-label"
                                                   for="userpassword">{{trans('admin::signing.password')}}</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" id=""
                                                       placeholder="{{trans('admin::signing.enter_password')}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 waves-effect waves-light"
                                                        type="submit">{{trans('admin::signing.login')}} <i
                                                        class="fas fa-sign-in-alt ms-1"></i></button>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end form-group-->
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                        <div class="card-body bg-light-alt text-center">
                                <span class="text-muted d-none d-sm-inline-block">شركت زيبا © <script>
                                        document.write(new Date().getFullYear())
                                    </script></span>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
<!--end container-->
<!-- End Log In page -->


<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>
<script src="{{asset('assets/js/feather.min.js')}}"></script>
<script src="{{asset('assets/js/simplebar.min.js')}}"></script>
@include('sweetalert::alert')
</body>

</html>
