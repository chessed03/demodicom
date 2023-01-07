<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Control servers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="{{ asset("template/boxicons/css/boxicons.min.css" )}}" rel="stylesheet">

    <!-- Plugins css -->
    <link href="{{ asset('template/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/libs/jquery-nice-select/nice-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/libs/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <script defer src="{{ asset('template/alpine/alpine.js') }}"></script>

    @livewireStyles

</head>

<body class="left-side-menu-light">

<!-- Begin page -->
<div id="wrapper">

    <!-- Pre-loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">Loading...</div>
        </div>
    </div>
    <!-- End Preloader-->

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo text-center">
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="16">
                                    <!-- <span class="logo-lg-text-light">Xeria</span> -->
                                </span>
                <span class="logo-sm">
                                    <!-- <span class="logo-sm-text-dark">X</span> -->
                                    <img src="assets/images/logo-sm.png" alt="" height="18">
                                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </li>

        </ul>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Menú</li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="la la-briefcase"></i>
                            <span> Modulos </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li>
                                <a href="{{ route('demo-index') }}">Dashboard</a>
                            </li>

                            <li>
                                <a href="{{ route('demo-sucursales') }}">Sucursales</a>
                            </li>

                            <li>
                                <a href="{{ route('demo-pacientes') }}">Pacientes</a>
                            </li>

                            <li>
                                <a href="{{ route('demo-expediente') }}">Expediente</a>
                            </li>

                        </ul>
                    </li>

                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content"><!-- Start Content-->

            @yield('content')

        </div><!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2019 &copy; Xeria theme by <a href="">Coderthemes</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h5 class="m-0 text-white">Settings</h5>
    </div>
    <div class="slimscroll-menu">
        <!-- User box -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{ asset('template/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
            </div>

            <h5><a href="javascript: void(0);">Marcia J. Melia</a> </h5>
            <p class="text-muted mb-0"><small>Product Owner</small></p>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <div class="row">
            <div class="col-6 text-center">
                <h4 class="mb-1 mt-0">8,504</h4>
                <p class="m-0">Balance</p>
            </div>
            <div class="col-6 text-center">
                <h4 class="mb-1 mt-0">8,504</h4>
                <p class="m-0">Balance</p>
            </div>
        </div>
        <hr class="mb-0" />

        <div class="p-3">
            <div class="custom-control custom-switch mb-2">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                <label class="custom-control-label" for="customSwitch1">Notifications</label>
            </div>
            <div class="custom-control custom-switch mb-2">
                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                <label class="custom-control-label" for="customSwitch2">API Access</label>
            </div>
            <div class="custom-control custom-switch mb-2">
                <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                <label class="custom-control-label" for="customSwitch3">Auto Updates</label>
            </div>
            <div class="custom-control custom-switch mb-2">
                <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                <label class="custom-control-label" for="customSwitch4">Online Status</label>
            </div>
        </div>

        <!-- Timeline -->
        <hr class="mt-0" />
        <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
        <hr class="mb-0" />
        <div class="p-3">
            <div class="inbox-widget">
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                    <p class="inbox-item-text">I've finished it! See you so...</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                    <p class="inbox-item-text">This theme is awesome!</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                    <p class="inbox-item-text">Nice to meet you</p>
                </div>

                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                    <p class="inbox-item-text">Hey! there I'm available...</p>
                </div>
                <div class="inbox-item">
                    <div class="inbox-item-img"><img src="assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                    <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                    <p class="inbox-item-text">This theme is awesome!</p>
                </div>
            </div> <!-- end inbox-widget -->
        </div> <!-- end .p-3-->

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{ asset('template/js/vendor.min.js') }}"></script>
<script src="{{ asset('template/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('template/libs/jquery-toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('template/libs/jquery-nice-select/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('template/libs/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('template/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('template/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('template/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('template/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('template/libs/moment/moment.min.js') }}"></script>
<script src="{{ asset('template/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('template/libs/daterangepicker/daterangepicker.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/js/app.min.js') }}"></script>

@livewireScripts

@stack('js')

<script type="text/javascript">

    window.livewire.on('closeCreateModal', () => {
        $('#createModal').modal('hide');
    });

    window.livewire.on('closeUpdateModal', () => {
        $('#updateModal').modal('hide');
    });

    window.livewire.on('message', (heading, text, icon) => {

        setTimeout(
            function()
            {

                $.toast({
                    heading: heading,
                    text: text,
                    icon: icon,
                    loader: true,
                    showHideTransition: 'fade',
                    position: 'top-right'
                });

            }, 250);

    });

</script>


</body>
</html>
