<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Mar 2022 14:24:01 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Dashboard | Skote - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('contents/admin') }}/images/favicon.ico">
            <!-- DataTables -->
            <link href="{{ asset('contents/admin') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
            <link href="{{ asset('contents/admin') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"/>

            <!-- Responsive datatable examples -->
            <link href="{{ asset('contents/admin') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"/>

        <!-- Bootstrap Css -->
        <link href="{{ asset('contents/admin') }}/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- Icons Css -->
        <link href="{{ asset('contents/admin') }}/css/icons.min.css" rel="stylesheet"/>
        <!-- App Css-->
        <link href="{{ asset('contents/admin') }}/css/app.min.css" rel="stylesheet"/>
        <link href="{{ asset('contents/admin') }}/css/style.css" rel="stylesheet"/>
        <script src="{{ asset('contents/admin') }}/js/sweetalert.min.js"></script>

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('contents/admin') }}/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('contents/admin') }}/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('contents/admin') }}/images/logo-light.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('contents/admin') }}/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="{{ asset('contents/admin') }}/images/flags/us.jpg" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                                    <img src="{{ asset('contents/admin') }}/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                                    <img src="{{ asset('contents/admin') }}/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                                    <img src="{{ asset('contents/admin') }}/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                                    <img src="{{ asset('contents/admin') }}/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                                    <img src="{{ asset('contents/admin') }}/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-customize"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                <div class="px-lg-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{ asset('contents/admin') }}/images/brands/github.png" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{ asset('contents/admin') }}/images/brands/bitbucket.png" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{ asset('contents/admin') }}/images/brands/dribbble.png" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{ asset('contents/admin') }}/images/brands/dropbox.png" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{ asset('contents/admin') }}/images/brands/mail_chimp.png" alt="mail_chimp">
                                                <span>Mail Chimp</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{ asset('contents/admin') }}/images/brands/slack.png" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small" key="t-view-all"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="{{ asset('contents/admin') }}/images/users/avatar-3.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">James Lemire</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-shipped">Your item is shipped</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="{{ asset('contents/admin') }}/images/users/avatar-4.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Salena Layfield</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend of mine occidental.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset('contents/admin') }}/images/users/avatar-1.jpg"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">Henry</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                                <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                    @csrf
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                        <span key="t-logout">Logout</span></a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>
                            <li>
                                <a href="{{ route('dashboard') }}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboards</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-list-ul"></i>
                                    <span>Product</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="#">Caregory</a></li>
                                    <li><a href="{{ route('product.type.index') }}">Product Type</a></li>
                                    <li><a href="calendar-full.html">Product List</a></li>
                                    <li><a href="calendar.html">Add Product</a></li>
                                    <li><a href="calendar.html">Print Barcode</a></li>
                                    <li><a href="calendar.html">Adjustment List</a></li>
                                    <li><a href="calendar.html">Add Adjustment</a></li>
                                    <li><a href="calendar.html">Stock Count</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-credit-card"></i>
                                    <span key="t-ecommerce">Purchase</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="ecommerce-products.html">Purchase List</a></li>
                                    <li><a href="ecommerce-product-detail.html">Add Purchase</a></li>
                                    <li><a href="ecommerce-products.html">Import Purchase by CSV</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-cart"></i>
                                    <span>Sale</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="calendar.html">Sale List</a></li>
                                    <li><a href="calendar-full.html">POS</a></li>
                                    <li><a href="calendar.html">Add Sale</a></li>
                                    <li><a href="calendar.html">Import Sale by CSV</a></li>
                                    <li><a href="calendar.html">Gift Card List</a></li>
                                    <li><a href="calendar.html">Coupon List</a></li>
                                    <li><a href="calendar.html">Delivery List</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-wallet-alt"></i>
                                    <span key="t-ecommerce">Expense</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('expense.category.index') }}">Expense Category</a></li>
                                    <li><a href="ecommerce-product-detail.html">Expense List</a></li>
                                    <li><a href="ecommerce-products.html">Add Expense</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-detail"></i>
                                    <span key="t-ecommerce">Quotation</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="ecommerce-products.html">Quotation List</a></li>
                                    <li><a href="ecommerce-product-detail.html">Add Quotation</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-transfer-alt"></i>
                                    <span key="t-ecommerce">Transfer</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="ecommerce-products.html">Transfer List</a></li>
                                    <li><a href="ecommerce-product-detail.html">Add Transfer</a></li>
                                    <li><a href="ecommerce-products.html">Import Transfer by CSV</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-rotate-left"></i>
                                    <span key="t-ecommerce">Return</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="ecommerce-products.html">Sale</a></li>
                                    <li><a href="ecommerce-product-detail.html">Purchase</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-briefcase-alt-2"></i>
                                    <span>Accounting</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="calendar.html">Account List</a></li>
                                    <li><a href="calendar.html">Add Account</a></li>
                                    <li><a href="calendar.html">Money Transfer</a></li>
                                    <li><a href="calendar.html">Balance Sheet</a></li>
                                    <li><a href="calendar.html">Account Statement</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="dripicons-user-group"></i>
                                    <span>HRM</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('department.index') }}">Department</a></li>
                                    <li><a href="calendar.html">Employee</a></li>
                                    <li><a href="calendar.html">Attendance</a></li>
                                    <li><a href="calendar.html">Payroll</a></li>
                                    <li><a href="calendar.html">Holiday</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bx-user"></i>
                                    <span>People</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('user.index') }}">User List</a></li>
                                    <li><a href="{{ route('user.create') }}">Add User</a></li>
                                    <li><a href="{{ route('customer.index') }}">Customer List</a></li>
                                    <li><a href="{{ route('customer.create') }}">Add Customer</a></li>
                                    <li><a href="{{ route('biller.index') }}">Biller List</a></li>
                                    <li><a href="{{ route('biller.create') }}">Add Biller</a></li>
                                    <li><a href="{{ route('supplier.index') }}">Supplier List</a></li>
                                    <li><a href="{{ route('supplier.create') }}">Add Supplier</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bxs-report"></i>
                                    <span>Reports</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="calendar.html">Summary Report</a></li>
                                    <li><a href="calendar.html">Best Seller</a></li>
                                    <li><a href="calendar.html">Product Report</a></li>
                                    <li><a href="calendar.html">Daily Sale</a></li>
                                    <li><a href="calendar.html">Monthly Sale</a></li>
                                    <li><a href="calendar.html">Daily Purchase</a></li>
                                    <li><a href="calendar.html">Monthly Purchase</a></li>
                                    <li><a href="calendar.html">Sale Report</a></li>
                                    <li><a href="calendar.html">Payment Report</a></li>
                                    <li><a href="calendar.html">Purchase Report</a></li>
                                    <li><a href="calendar.html">Warehouse Report</a></li>
                                    <li><a href="calendar.html">Warehouse Stock Chart</a></li>
                                    <li><a href="calendar.html">Product Quantity Alert</a></li>
                                    <li><a href="calendar.html">User Report</a></li>
                                    <li><a href="calendar.html">Customer Report</a></li>
                                    <li><a href="calendar.html">Supplier Report</a></li>
                                    <li><a href="calendar.html">Due Report</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="has-arrow waves-effect">
                                    <i class="bx bxs-cog"></i>
                                    <span>Settings</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('role.index') }}">Role Permission</a></li>
                                    <li><a href="{{ route('basic.index') }}">Basic Information</a></li>
                                    <li><a href="{{ route('social.index') }}">Social Media</a></li>
                                    <li><a href="{{ route('contact.index') }}">Contact Information</a></li>
                                    <li><a href="calendar.html">Discount Plan</a></li>
                                    <li><a href="calendar.html">Discout</a></li>
                                    <li><a href="calendar.html">Send Notification</a></li>
                                    <li><a href="{{ route('warehouse.index') }}">Warehouse</a></li>
                                    <li><a href="{{ route('cg.index') }}">Customer Group</a></li>
                                    <li><a href="{{ route('brand.index') }}">Brand</a></li>
                                    <li><a href="calendar.html">Unit</a></li>
                                    <li><a href="calendar.html">Currency</a></li>
                                    <li><a href="{{ route('tax.index') }}">Tax</a></li>
                                    <li><a href="calendar.html">User Profile</a></li>
                                    <li><a href="calendar.html">Create SMS</a></li>
                                    <li><a href="calendar.html">Backup Database</a></li>
                                    <li><a href="calendar.html">General Setting</a></li>
                                    <li><a href="calendar.html">Mail Setting</a></li>
                                    <li><a href="calendar.html">Reward Point Setting</a></li>
                                    <li><a href="calendar.html">SMS Setting</a></li>
                                    <li><a href="calendar.html">POS Setting</a></li>
                                    <li><a href="calendar.html">HRM Setting</a></li>
                                </ul>
                            </li>

                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bx bx-power-off font-size-16  text-danger"></i>
                                        <span key="t-logout">Logout</span></a>
                                </a>
                            </li>
                        </form>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Creative Shaper.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Creative Shaper
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        <script src="{{ asset('contents/admin') }}/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('contents/admin') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('contents/admin') }}/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ asset('contents/admin') }}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('contents/admin') }}/libs/node-waves/waves.min.js"></script>
        <script src="{{ asset('contents/admin') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('contents/admin') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <!-- apexcharts -->
        {{-- <script src="{{ asset('contents/admin') }}/libs/apexcharts/apexcharts.min.js"></script> --}}

        <!-- dashboard init -->
        <script src="{{ asset('contents/admin') }}/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{ asset('contents/admin') }}/js/app.js"></script>
        <script src="{{ asset('contents/admin') }}/js/custom.js"></script>

    </body>

</html>
