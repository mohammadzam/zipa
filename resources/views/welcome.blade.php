
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>سامانه كلينيك جراحى زيبا</title>
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

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="pricingTable1 text-center">
                                    <h6 class="title1 pt-3 pb-2 m-0">ورود مديران</h6>
                                    <hr class="hr-dashed">

                                    <a href="{{route('admin.show.sign.in.page')}}" class="btn btn-dark py-2 px-5 font-16"><span>ورود</span></a>
                                </div><!--end pricingTable-->
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="pricingTable1 text-center">
                                    <h6 class="title1 pt-3 pb-2 m-0">ورود بيماران</h6>
                                    <hr class="hr-dashed">

                                    <a href="{{route('sick.show.sign.in.page')}}" class="btn btn-dark py-2 px-5 font-16"><span>ورود</span></a>
                                </div><!--end pricingTable-->
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div><!--end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="pricingTable1 text-center">
                                    <h6 class="title1 pt-3 pb-2 m-0">ورود پزشکان</h6>
                                    <hr class="hr-dashed">

                                    <a href="{{route('doctor.show.sign.in.page')}}" class="btn btn-dark py-2 px-5 font-16"><span>ورود</span></a>
                                </div><!--end pricingTable-->
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div><!--end col-->
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
</body>

</html>

