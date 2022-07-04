<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{$page_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- jvectormap -->
    <link href="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/huebee/huebee.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/timepicker/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/avatar-uploade.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/jalalidatepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/jalalidatepicker2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/circulationInvoiceBorderes.css')}}" rel="stylesheet" type="text/css" />
</head>
<body class="">
<style></style>
<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="" class="logo">
            <span>
             <img style="width:88px ;height: 91px" src="{{asset('assets/images/zipa.png')}}"  alt="logo-large" class="logo-lg logo-dark">
           </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">{{trans('panel::panel.main')}}</li>
            <li>
                <a href="javascript: void(0);">
                    <i data-feather="activity" class="align-self-center menu-icon"></i>
                    <span>{{trans('panel::panel.dashboard')}}</span>
                    <span class="menu-arrow">
                 <i class="mdi mdi-chevron-right"></i>
               </span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('admin.show.dashboard')}}">
                            <i class="ti-control-record"></i>{{trans('panel::panel.dashboard')}}
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('admin.show.admins')}}">
                            <i class="ti-control-record"></i>{{trans('panel::panel.admins')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.show.sections')}}">
                            <i class="ti-control-record"></i>{{trans('panel::panel.sections')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.sick.show.reserves.times')}}">
                            <i class="ti-control-record"></i>{{trans('panel::panel.reserves_times')}}
                        </a>
                    </li>
                </ul>
            </li>
            <hr class="hr-dashed hr-menu">
            <li>
                <a href="javascript: void(0);">
                    <i data-feather="activity" class="align-self-center menu-icon"></i>
                    <span>{{trans('panel::panel.doctors')}}</span>
                    <span class="menu-arrow">
                 <i class="mdi mdi-chevron-right"></i>
               </span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.show.doctors')}}">
                            <i class="ti-control-record"></i>{{trans('panel::panel.doctors')}}
                        </a>
                    </li>
                </ul>
            </li>
            <hr class="hr-dashed hr-menu">
            <li>
                <a href="javascript: void(0);">
                    <i data-feather="activity" class="align-self-center menu-icon"></i>
                    <span>{{trans('panel::panel.sicks')}}</span>
                    <span class="menu-arrow">
                 <i class="mdi mdi-chevron-right"></i>
               </span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.show.sicks')}}">
                            <i class="ti-control-record"></i>{{trans('panel::panel.sicks')}}
                        </a>
                    </li>
                </ul>
            </li>
            <hr class="hr-dashed hr-menu">
            <li>
                <a href="javascript: void(0);">
                    <i data-feather="activity" class="align-self-center menu-icon"></i>
                    <span>{{trans('panel::panel.financial matters')}}</span>
                    <span class="menu-arrow">
                 <i class="mdi mdi-chevron-right"></i>
               </span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.surgery.costs.index')}}">
                            <i class="ti-control-record"></i>{{trans('panel::panel.Surgery costs')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.appointment.costs.index')}}">
                            <i class="ti-control-record"></i>{{trans('panel::panel.appointment costs')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.shifts.costs.index')}}">
                            <i class="ti-control-record"></i>{{trans('panel::panel.shifts costs')}}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- end left-sidenav-->
<div class="page-wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">
            <ul class="list-unstyled topbar-nav float-end mb-0">
                <li class="dropdown hide-phone">
                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="search" class="topbar-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg p-0">
                        <!-- Top Search Bar -->
                        <div class="app-search-topbar">
                            <form action="#" method="get">
                                <input type="search" name="search" class="from-control top-search mb-0" placeholder="{{trans('panel::panel.type_text....')}}">
                                <button type="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="ms-1 nav-user-name hidden-sm">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        <img src="{{asset('assets/images/default-avatar.svg')}}" alt="profile-user" class="rounded-circle thumb-xs" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">
                            <i data-feather="user" class="align-self-center icon-xs icon-dual me-1"></i> {{trans('panel::panel.profile')}}
                        </a>
                        <a class="dropdown-item" href="#">
                            <i data-feather="settings" class="align-self-center icon-xs icon-dual me-1"></i> {{trans('panel::panel.settings')}}
                        </a>
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> {{trans('panel::panel.logout')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
                    </div>
                </li>
            </ul>
            <!--end topbar-nav-->
            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="nav-link button-menu-mobile">
                        <i data-feather="menu" class="align-self-center topbar-icon"></i>
                    </button>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <!-- Page Content-->
    <div class="page-content">
       @yield('dashboard_content')
    @yield('content')
    <!-- container -->
        <footer class="footer text-center text-sm-start"> &copy; <script>
                document.write(new Date().getFullYear())
            </script> {{trans('panel::panel.Zipa')}}
            <span class="text-muted d-none d-sm-inline-block float-end">{{trans('panel::panel.Crafted with')}}
             <i class="mdi mdi-heart text-danger"></i> {{trans('panel::panel.Zipa')}}
           </span>
        </footer>
        <!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
<!-- jQuery  -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/metismenu.min.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>
<script src="{{asset('assets/js/feather.min.js')}}"></script>
<script src="{{asset('assets/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/jalalidatepicker.js')}}"></script>
<script src="{{asset('assets/js/jalalidatepicker2.js')}}"></script>
<!-- Required datatable js-->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
<script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables/buttons.colVis.min.js')}}"></script>
<!-- Required datatable js-->
<!-- Responsive table-->
<script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/pages/jquery.datatable.init.js')}}"></script>
<!-- Responsive table-->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/apex-charts/apexcharts.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('assets/pages/jquery.analytics_dashboard.init.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('plugins/huebee/huebee.pkgd.min.js')}}"></script>
<script src="{{asset('plugins/timepicker/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('assets/pages/jquery.forms-advanced.js')}}"></script>
<script src="{{asset('assets/js/num2persian.js')}}"></script>
<script src="{{asset('assets/js/num2persian-min.js')}}"></script>
<script src="{{asset('plugins/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('assets/pages/jquery.form-repeater.js')}}"></script>
<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script> @include('sweetalert::alert')
</body>
</html>
