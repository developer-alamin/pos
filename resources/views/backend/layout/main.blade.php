<!DOCTYPE html>
<html dir="@if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl){{'rtl'}}@endif">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @if(!config('database.connections.saleprosaas_landlord'))
    <link rel="icon" type="image/png" href="{{ asset('logo/favicon.ico') }}" />
    <title>{{$general_setting->site_title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{url('manifest.json')}}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css">
    <link rel="preload" href="<?php echo asset('vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('vendor/bootstrap/css/bootstrap-datepicker.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="<?php echo asset('vendor/jquery-timepicker/jquery.timepicker.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/jquery-timepicker/jquery.timepicker.min.css') ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('vendor/bootstrap/css/awesome-bootstrap-checkbox.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/bootstrap/css/awesome-bootstrap-checkbox.css') ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('vendor/bootstrap/css/bootstrap-select.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/bootstrap/css/bootstrap-select.min.css') ?>" rel="stylesheet">
    </noscript>
    <!-- Font Awesome CSS-->
    <link rel="preload" href="<?php echo asset('vendor/font-awesome/css/font-awesome.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    </noscript>
    <!-- Drip icon font-->
    <link rel="preload" href="<?php echo asset('vendor/dripicons/webfont.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/dripicons/webfont.css') ?>" rel="stylesheet">
    </noscript>

    <!-- jQuery Circle-->
    <link rel="preload" href="<?php echo asset('css/grasp_mobile_progress_circle-1.0.0.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('css/grasp_mobile_progress_circle-1.0.0.min.css') ?>" rel="stylesheet">
    </noscript>
    <!-- Custom Scrollbar-->
    <link rel="preload" href="<?php echo asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') ?>"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') ?>"
            rel="stylesheet">
    </noscript>

    @if(Route::current()->getName() != '/')
    <!-- date range stylesheet-->
    <link rel="preload" href="<?php echo asset('vendor/daterange/css/daterangepicker.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/daterange/css/daterangepicker.min.css') ?>" rel="stylesheet">
    </noscript>
    <!-- table sorter stylesheet-->
    <link rel="preload" href="<?php echo asset('vendor/datatable/dataTables.bootstrap4.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/datatable/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    </noscript>
    <link rel="preload" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    </noscript>
    @endif

    <link rel="stylesheet" href="<?php echo asset('css/style.default.css') ?>" id="theme-stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/dropzone.css') ?>">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo asset('css/custom-'.$general_setting->theme) ?>" type="text/css"
        id="custom-style">

    @if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
    <!-- RTL css -->
    <link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap-rtl.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/custom-rtl.css') ?>" type="text/css" id="custom-style">
    @endif
    @else
    <link rel="icon" type="image/png" href="{{url('../../logo', $general_setting->site_logo)}}" />
    <title>{{$general_setting->site_title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{url('manifest.json')}}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css">
    <link rel="preload" href="<?php echo asset('../../vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') ?>"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-datepicker.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('../../vendor/jquery-timepicker/jquery.timepicker.min.css') ?>"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/jquery-timepicker/jquery.timepicker.min.css') ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('../../vendor/bootstrap/css/awesome-bootstrap-checkbox.css') ?>"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/bootstrap/css/awesome-bootstrap-checkbox.css') ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-select.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-select.min.css') ?>" rel="stylesheet">
    </noscript>
    <!-- Font Awesome CSS-->
    <link rel="preload" href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    </noscript>
    <!-- Drip icon font-->
    <link rel="preload" href="<?php echo asset('../../vendor/dripicons/webfont.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/dripicons/webfont.css') ?>" rel="stylesheet">
    </noscript>

    <!-- jQuery Circle-->
    <link rel="preload" href="<?php echo asset('../../css/grasp_mobile_progress_circle-1.0.0.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../css/grasp_mobile_progress_circle-1.0.0.min.css') ?>" rel="stylesheet">
    </noscript>
    <!-- Custom Scrollbar-->
    <link rel="preload"
        href="<?php echo asset('../../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') ?>"
            rel="stylesheet">
    </noscript>

    @if(Route::current()->getName() != '/')
    <!-- date range stylesheet-->
    <link rel="preload" href="<?php echo asset('../../vendor/daterange/css/daterangepicker.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/daterange/css/daterangepicker.min.css') ?>" rel="stylesheet">
    </noscript>
    <!-- table sorter stylesheet-->
    <link rel="preload" href="<?php echo asset('../../vendor/datatable/dataTables.bootstrap4.min.css') ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/datatable/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    </noscript>
    <link rel="preload" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    </noscript>
    @endif

    <link rel="stylesheet" href="<?php echo asset('../../css/style.default.css') ?>" id="theme-stylesheet"
        type="text/css">
    <link rel="stylesheet" href="<?php echo asset('../../css/dropzone.css') ?>">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo asset('../../css/custom-'.$general_setting->theme) ?>" type="text/css"
        id="custom-style">

    @if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
    <!-- RTL css -->
    <link rel="stylesheet" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-rtl.min.css') ?>"
        type="text/css">
    <link rel="stylesheet" href="<?php echo asset('../../css/custom-rtl.css') ?>" type="text/css" id="custom-style">
    @endif
    @endif
    <!-- Google fonts - Roboto -->
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" rel="stylesheet">
    </noscript>

    <style>
        body {
            color: #1E1E2C !important;
        }

        .side-navbar li a i {
            color: #1E1E2C !important;
        }

        .active {
            background: #fdbd91;
            border-radius: 1%;
        }

        .side-navbar li a:focus,
        .side-navbar li a:hover,
        .side-navbar li a[aria-expanded=true],
        .side-navbar li.active>a {
            color: #1E1E2C !important;
        }

        a.menu-btn {
            border: 1px solid #1E1E2C !important;
            color: #1E1E2C !important;
        }

        .btn-pos {
            border: 1px solid #1E1E2C !important;
        }

        .btn-pos i,
        .btn-pos span {
            color: #1E1E2C !important;
        }

        nav.navbar .nav-item a i {
            color: #1E1E2C !important;
        }

        .brand-text h3 {
            color: #F29F67 !important;
        }
    </style>
</head>

<body @if($theme=='dark' ) class="dark-mode dripicons-brightness-low" @else class="" @endif onload="myFunction()">
    <div id="loader"></div>
    <!-- Side Navbar -->
    
    <nav class="side-navbar">
        <span class="brand-big">
            @if($general_setting->site_logo)
            <a href="{{url('/')}}"><img src="{{url('logo', $general_setting->site_logo)}}" width="115"></a>
            @else
            <a href="{{url('/')}}">
                <h1 class="d-inline">{{$general_setting->site_title}}</h1>
            </a>
            @endif
        </span>
        <ul id="side-main-menu" class="side-menu list-unstyled">
            <li class="{{request()->is('/') ? 'active' : ''}}"><a href="{{url('/')}}"> <i
                        class="dripicons-meter"></i><span>{{ __('dashboard')
                        }}</span></a></li>
            <?php
                $role = DB::table('roles')->find(Auth::user()->role_id);
                $category_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'category'],
                        ['role_id', $role->id] 
                    ])->first();

                $brand_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'brand'],
                            ['role_id', $role->id]
                        ])->first();

                $index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'products-index'],
                        ['role_id', $role->id] 
                    ])->first();

                $print_barcode_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'print_barcode'],
                        ['role_id', $role->id] 
                    ])->first();

                $stock_count_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'stock_count'],
                        ['role_id', $role->id] 
                    ])->first();

                $adjustment_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'adjustment'],
                        ['role_id', $role->id] 
                    ])->first();
            ?>
            @if($category_permission_active || $index_permission_active || $print_barcode_active || $stock_count_active
            || $adjustment_active)
            <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-list"></i><span>{{__('product')}}</span><span></a>
                <ul id="product" class="collapse list-unstyled ">
                    @if($category_permission_active)
                    <li class="" id="category-menu"><a
                            href="{{route('category.index')}}">{{__('category')}}</a></li>
                    @endif
                    @if($brand_permission_active)
                    <li class="" id="brand-menu"><a
                            href="{{route('brand.index')}}">{{trans('Brand')}}</a></li>
                    @endif
                    @if($index_permission_active)
                    <li id="product-list-menu"><a href="{{route('products.index')}}">{{__('Product list')}}</a>
                    </li>
                    <?php
                    $add_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                            ['permissions.name', 'products-add'],
                            ['role_id', $role->id] 
                        ])->first();
                ?>
                    @if($add_permission_active)
                    <li id="product-create-menu"><a href="{{route('products.create')}}">{{__('Add Product')}}</a>
                    </li>
                    @endif
                    @endif
                    @if($print_barcode_active)
                    <li id="printBarcode-menu"><a href="{{route('product.printBarcode')}}">{{__('Print Barcode')}}</a>
                    </li>
                    @endif
                    @if($adjustment_active)
                    <li id="adjustment-list-menu"><a href="{{route('qty_adjustment.index')}}">{{trans('Adjustment
                            List')}}</a></li>
                    <li id="adjustment-create-menu"><a href="{{route('qty_adjustment.create')}}">{{trans('Add
                            Adjustment')}}</a></li>
                    @endif
                    @if($stock_count_active)
                    <li id="stock-count-menu"><a href="{{route('stock-count.index')}}">{{trans('Stock Count')}}</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            <?php
                $index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'purchases-index'],
                        ['role_id', $role->id] 
                    ])->first();
            ?>
            @if($index_permission_active)
            <li><a href="#purchase" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-card"></i><span>{{trans('Purchase')}}</span></a>
                <ul id="purchase" class="collapse list-unstyled ">
                    <li id="purchase-list-menu"><a href="{{route('purchases.index')}}">{{trans('Purchase
                            List')}}</a></li>
                    <?php
                    $add_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                            ['permissions.name', 'purchases-add'],
                            ['role_id', $role->id] 
                        ])->first();
                ?>
                    @if($add_permission_active)
                    <li id="purchase-create-menu"><a href="{{route('purchases.create')}}">{{trans('Add
                            Purchase')}}</a></li>
                    <li id="purchase-import-menu"><a href="{{url('purchases/purchase_by_csv')}}">{{trans('Import
                            Purchase By CSV')}}</a></li>
                    @endif
                </ul>
            </li>
            @endif
            <?php
                $sale_index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'sales-index'],
                        ['role_id', $role->id] 
                    ])->first();

                $gift_card_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'gift_card'],
                        ['role_id', $role->id]
                    ])->first();

                $coupon_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'coupon'],
                        ['role_id', $role->id]
                    ])->first();

                $delivery_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'delivery'],
                        ['role_id', $role->id] 
                    ])->first();

                $sale_add_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'sales-add'],
                        ['role_id', $role->id] 
                    ])->first();
            ?>
            @if($sale_index_permission_active || $gift_card_permission_active || $coupon_permission_active ||
            $delivery_permission_active)
            <li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-cart"></i><span>{{trans('Sale')}}</span></a>
                <ul id="sale" class="collapse list-unstyled ">
                    @if($sale_index_permission_active)
                    <li id="sale-list-menu"><a href="{{route('sales.index')}}">{{trans('Sale List')}}</a></li>
                    @if($sale_add_permission_active)
                    <li><a href="{{route('sale.pos')}}">POS</a></li>
                    <li id="sale-create-menu"><a href="{{route('sales.create')}}">{{trans('Add Sale')}}</a></li>
                    <li id="sale-import-menu"><a href="{{url('sales/sale_by_csv')}}">{{trans('Import Sale By
                            CSV')}}</a></li>
                    @endif
                    @endif

                    @if($gift_card_permission_active)
                    <li id="gift-card-menu"><a href="{{route('gift_cards.index')}}">{{trans('Gift Card List')}}</a>
                    </li>
                    @endif
                    @if($coupon_permission_active)
                    <li id="coupon-menu"><a href="{{route('coupons.index')}}">{{trans('Coupon List')}}</a> </li>
                    @endif
                    @if($delivery_permission_active)
                    <li id="delivery-menu"><a href="{{route('delivery.index')}}">{{trans('Delivery List')}}</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            <?php
                $index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'expenses-index'],
                        ['role_id', $role->id] 
                    ])->first();
            ?>
            @if($index_permission_active)
            <li><a href="#expense" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-wallet"></i><span>{{trans('Expense')}}</span></a>
                <ul id="expense" class="collapse list-unstyled ">
                    <li id="exp-cat-menu"><a href="{{route('expense_categories.index')}}">{{trans('Expense
                            Category')}}</a></li>
                    <li id="exp-list-menu"><a href="{{route('expenses.index')}}">{{trans('Expense List')}}</a></li>
                    <?php
                    $add_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                            ['permissions.name', 'expenses-add'],
                            ['role_id', $role->id] 
                        ])->first();
                ?>
                    @if($add_permission_active)
                    <li><a id="add-expense" href=""> {{trans('Add Expense')}}</a></li>
                    @endif
                </ul>
            </li>
            @endif
            <?php
                $index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'quotes-index'],
                        ['role_id', $role->id] 
                    ])->first();
            ?>
            @if($index_permission_active)
            <li><a href="#quotation" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-document"></i><span>{{trans('Quotation')}}</span><span></a>
                <ul id="quotation" class="collapse list-unstyled ">
                    <li id="quotation-list-menu"><a href="{{route('quotations.index')}}">{{trans('Quotation
                            List')}}</a></li>
                    <?php
                    $add_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                            ['permissions.name', 'quotes-add'],
                            ['role_id', $role->id] 
                        ])->first();
                ?>
                    @if($add_permission_active)
                    <li id="quotation-create-menu"><a href="{{route('quotations.create')}}">{{trans('Add
                            Quotation')}}</a></li>
                    @endif
                </ul>
            </li>
            @endif
            <?php
                $index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'transfers-index'],
                        ['role_id', $role->id] 
                    ])->first();
            ?>
            @if($index_permission_active)
            <li><a href="#transfer" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-export"></i><span>{{trans('Transfer')}}</span></a>
                <ul id="transfer" class="collapse list-unstyled ">
                    <li id="transfer-list-menu"><a href="{{route('transfers.index')}}">{{trans('Transfer
                            List')}}</a></li>
                    <?php
                    $add_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                            ['permissions.name', 'transfers-add'],
                            ['role_id', $role->id] 
                        ])->first();
                ?>
                    @if($add_permission_active)
                    <li id="transfer-create-menu"><a href="{{route('transfers.create')}}">{{trans('Add
                            Transfer')}}</a></li>
                    <li id="transfer-import-menu"><a href="{{url('transfers/transfer_by_csv')}}">{{trans('Import
                            Transfer By CSV')}}</a></li>
                    @endif
                </ul>
            </li>
            @endif

            <?php
                $sale_return_index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'returns-index'],
                        ['role_id', $role->id] 
                    ])->first();

                $purchase_return_index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'purchase-return-index'],
                        ['role_id', $role->id] 
                    ])->first();
            ?>
            @if($sale_return_index_permission_active || $purchase_return_index_permission_active)
            <li><a href="#return" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-return"></i><span>{{trans('return')}}</span></a>
                <ul id="return" class="collapse list-unstyled ">
                    @if($sale_return_index_permission_active)
                    <li id="sale-return-menu"><a href="{{route('return-sale.index')}}">{{trans('Sale')}}</a></li>
                    @endif
                    @if($purchase_return_index_permission_active)
                    <li id="purchase-return-menu"><a href="{{route('return-purchase.index')}}">{{trans('Purchase')}}</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            <?php
                $index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'account-index'],
                        ['role_id', $role->id] 
                    ])->first();

                $money_transfer_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'money-transfer'],
                        ['role_id', $role->id] 
                    ])->first();

                $balance_sheet_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'balance-sheet'],
                        ['role_id', $role->id] 
                    ])->first();

                $account_statement_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'account-statement'],
                        ['role_id', $role->id] 
                    ])->first();

            ?>
            {{--
            @if($index_permission_active || $balance_sheet_permission_active || $account_statement_permission_active ||
            $money_transfer_permission_active)
            <li class=""><a href="#account" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-briefcase"></i><span>{{trans('Accounting')}}</span></a>
                <ul id="account" class="collapse list-unstyled ">
                    @if($index_permission_active)
                    <li id="account-list-menu"><a href="{{route('accounts.index')}}">{{trans('Account List')}}</a>
                    </li>
                    <li><a id="add-account" href="">{{trans('Add Account')}}</a></li>
                    @endif
                    @if($money_transfer_permission_active)
                    <li id="money-transfer-menu"><a href="{{route('money-transfers.index')}}">{{trans('Money
                            Transfer')}}</a></li>
                    @endif
                    @if($balance_sheet_permission_active)
                    <li id="balance-sheet-menu"><a href="{{route('accounts.balancesheet')}}">{{trans('Balance
                            Sheet')}}</a></li>
                    @endif
                    @if($account_statement_permission_active)
                    <li id="account-statement-menu"><a id="account-statement" href="">{{trans('Account
                            Statement')}}</a></li>
                    @endif
                </ul>
            </li>
            @endif --}}
            <?php
                $department_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'department'],
                        ['role_id', $role->id] 
                    ])->first();

                $index_employee_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'employees-index'],
                        ['role_id', $role->id] 
                    ])->first();

                $attendance_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'attendance'],
                        ['role_id', $role->id] 
                    ])->first();

                $payroll_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'payroll'],
                        ['role_id', $role->id] 
                    ])->first();
            ?>

            {{-- @if(Auth::user()->role_id != 5)
            <li class=""><a href="#hrm" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-user-group"></i><span>HRM</span></a>
                <ul id="hrm" class="collapse list-unstyled ">
                    @if($department_active)
                    <li id="dept-menu"><a href="{{route('departments.index')}}">{{trans('Department')}}</a></li>
                    @endif
                    @if($index_employee_active)
                    <li id="employee-menu"><a href="{{route('employees.index')}}">{{trans('Employee')}}</a></li>
                    @endif
                    @if($attendance_active)
                    <li id="attendance-menu"><a href="{{route('attendance.index')}}">{{trans('Attendance')}}</a>
                    </li>
                    @endif
                    @if($payroll_active)
                    <li id="payroll-menu"><a href="{{route('payroll.index')}}">{{trans('Payroll')}}</a></li>
                    @endif
                    <li id="holiday-menu"><a href="{{route('holidays.index')}}">{{trans('Holiday')}}</a></li>
                </ul>
            </li>
            @endif --}}
            <?php
                $user_index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'users-index'],
                        ['role_id', $role->id] 
                    ])->first();

                $customer_index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'customers-index'],
                        ['role_id', $role->id] 
                    ])->first();

                $biller_index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'billers-index'],
                        ['role_id', $role->id] 
                    ])->first();

                $supplier_index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'suppliers-index'],
                        ['role_id', $role->id] 
                    ])->first();
            ?>
            @if($user_index_permission_active || $customer_index_permission_active || $biller_index_permission_active ||
            $supplier_index_permission_active)
            <li><a href="#people" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-user"></i><span>{{trans('People')}}</span></a>
                <ul id="people" class="collapse list-unstyled ">

                    @if($user_index_permission_active)
                    <li id="user-list-menu"><a href="{{route('user.index')}}">{{trans('User List')}}</a></li>
                    <?php
                        $user_add_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                                ['permissions.name', 'users-add'],
                                ['role_id', $role->id] 
                            ])->first();
                    ?>
                    @if($user_add_permission_active)
                    <li id="user-create-menu"><a href="{{route('user.create')}}">{{trans('Add User')}}</a></li>
                    @endif
                    @endif

                    @if($customer_index_permission_active)
                    <li id="customer-list-menu"><a href="{{route('customer.index')}}">{{trans('Customer
                            List')}}</a></li>
                    <?php
                        $customer_add_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                                ['permissions.name', 'customers-add'],
                                ['role_id', $role->id] 
                            ])->first();
                    ?>
                    @if($customer_add_permission_active)
                    <li id="customer-create-menu"><a href="{{route('customer.create')}}">{{trans('Add
                            Customer')}}</a></li>
                    @endif
                    @endif

                    @if($biller_index_permission_active)
                    <li id="biller-list-menu"><a href="{{route('biller.index')}}">{{trans('Biller List')}}</a></li>
                    <?php
                        $biller_add_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                                ['permissions.name', 'billers-add'],
                                ['role_id', $role->id] 
                            ])->first();
                    ?>
                    @if($biller_add_permission_active)
                    <li id="biller-create-menu"><a href="{{route('biller.create')}}">{{trans('Add Biller')}}</a>
                    </li>
                    @endif
                    @endif

                    @if($supplier_index_permission_active)
                    <li id="supplier-list-menu"><a href="{{route('supplier.index')}}">{{trans('Supplier
                            List')}}</a></li>
                    <?php
                        $supplier_add_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                                ['permissions.name', 'suppliers-add'],
                                ['role_id', $role->id] 
                            ])->first();
                    ?>
                    @if($supplier_add_permission_active)
                    <li id="supplier-create-menu"><a href="{{route('supplier.create')}}">{{trans('Add
                            Supplier')}}</a></li>
                    @endif
                    @endif
                </ul>
            </li>
            @endif

            <?php
                $profit_loss_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'profit-loss'],
                        ['role_id', $role->id] 
                ])->first();
                $best_seller_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'best-seller'],
                        ['role_id', $role->id]
                ])->first();
                $warehouse_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'warehouse-report'],
                        ['role_id', $role->id] 
                ])->first();
                $warehouse_stock_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'warehouse-stock-report'],
                        ['role_id', $role->id] 
                ])->first();
                $product_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'product-report'],
                        ['role_id', $role->id] 
                ])->first();
                $daily_sale_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'daily-sale'],
                        ['role_id', $role->id] 
                ])->first();
                $monthly_sale_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'monthly-sale'],
                        ['role_id', $role->id]
                ])->first();
                $daily_purchase_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'daily-purchase'],
                        ['role_id', $role->id]
                ])->first();
                $monthly_purchase_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'monthly-purchase'],
                        ['role_id', $role->id]
                ])->first();
                $purchase_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'purchase-report'],
                        ['role_id', $role->id]
                ])->first();
                $sale_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'sale-report'],
                        ['role_id', $role->id]
                ])->first();
                $sale_report_chart_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'sale-report-chart'],
                        ['role_id', $role->id]
                ])->first();
                $payment_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'payment-report'],
                        ['role_id', $role->id]
                ])->first();
                $product_expiry_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'product-expiry-report'],
                        ['role_id', $role->id]
                ])->first();
                $product_qty_alert_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'product-qty-alert'],
                        ['role_id', $role->id] 
                ])->first();
                $dso_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'dso-report'],
                        ['role_id', $role->id] 
                ])->first();
                $user_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'user-report'],
                        ['role_id', $role->id]
                ])->first();
                $customer_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'customer-report'],
                        ['role_id', $role->id]
                ])->first();
                $supplier_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'supplier-report'],
                        ['role_id', $role->id]
                ])->first();
                $due_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'due-report'],
                        ['role_id', $role->id]
                ])->first();
                $supplier_due_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([
                        ['permissions.name', 'supplier-due-report'],
                        ['role_id', $role->id]
                ])->first();
            ?>
            @if($profit_loss_active || $best_seller_active || $warehouse_report_active || $warehouse_stock_report_active
            || $product_report_active || $daily_sale_active || $monthly_sale_active || $daily_purchase_active ||
            $monthly_purchase_active || $purchase_report_active || $sale_report_active || $sale_report_chart_active ||
            $payment_report_active || $product_expiry_report_active || $product_qty_alert_active || $dso_report_active
            || $user_report_active || $customer_report_active || $supplier_report_active || $due_report_active ||
            $supplier_due_report_active)
            <li><a href="#report" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-document-remove"></i><span>{{trans('Reports')}}</span></a>
                <ul id="report" class="collapse list-unstyled ">
                    @if($profit_loss_active)
                    <li id="profit-loss-report-menu">
                        {!! Form::open(['route' => 'report.profitLoss', 'method' => 'post', 'id' =>
                        'profitLoss-report-form']) !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                        <a id="profitLoss-link" href="">{{trans('Summary Report')}}</a>
                        {!! Form::close() !!}
                    </li>
                    @endif
                    @if($best_seller_active)
                    <li id="best-seller-report-menu">
                        <a href="{{url('report/best_seller')}}">{{trans('Best Seller')}}</a>
                    </li>
                    @endif
                    @if($product_report_active)
                    <li id="product-report-menu">
                        {!! Form::open(['route' => 'report.product', 'method' => 'get', 'id' => 'product-report-form'])
                        !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                        <input type="hidden" name="warehouse_id" value="0" />
                        <a id="report-link" href="">{{trans('Product Report')}}</a>
                        {!! Form::close() !!}
                    </li>
                    @endif
                    @if($daily_sale_active)
                    <li id="daily-sale-report-menu">
                        <a href="{{url('report/daily_sale/'.date('Y').'/'.date('m'))}}">{{trans('Daily Sale')}}</a>
                    </li>
                    @endif
                    @if($monthly_sale_active)
                    <li id="monthly-sale-report-menu">
                        <a href="{{url('report/monthly_sale/'.date('Y'))}}">{{trans('Monthly Sale')}}</a>
                    </li>
                    @endif
                    @if($daily_purchase_active)
                    <li id="daily-purchase-report-menu">
                        <a href="{{url('report/daily_purchase/'.date('Y').'/'.date('m'))}}">{{trans('Daily
                            Purchase')}}</a>
                    </li>
                    @endif
                    @if($monthly_purchase_active)
                    <li id="monthly-purchase-report-menu">
                        <a href="{{url('report/monthly_purchase/'.date('Y'))}}">{{trans('Monthly Purchase')}}</a>
                    </li>
                    @endif
                    @if($sale_report_active)
                    <li id="sale-report-menu">
                        {!! Form::open(['route' => 'report.sale', 'method' => 'post', 'id' => 'sale-report-form']) !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                        <input type="hidden" name="warehouse_id" value="0" />
                        <a id="sale-report-link" href="">{{trans('Sale Report')}}</a>
                        {!! Form::close() !!}
                    </li>
                    @endif
                    @if($sale_report_chart_active)
                    <li id="sale-report-chart-menu">
                        {!! Form::open(['route' => 'report.saleChart', 'method' => 'post', 'id' =>
                        'sale-report-chart-form']) !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                        <input type="hidden" name="warehouse_id" value="0" />
                        <input type="hidden" name="time_period" value="weekly" />
                        <a id="sale-report-chart-link" href="">{{trans('Sale Report Chart')}}</a>
                        {!! Form::close() !!}
                    </li>
                    @endif
                    @if($payment_report_active)
                    <li id="payment-report-menu">
                        {!! Form::open(['route' => 'report.paymentByDate', 'method' => 'post', 'id' =>
                        'payment-report-form']) !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                        <a id="payment-report-link" href="">{{trans('Payment Report')}}</a>
                        {!! Form::close() !!}
                    </li>
                    @endif
                    @if($purchase_report_active)
                    <li id="purchase-report-menu">
                        {!! Form::open(['route' => 'report.purchase', 'method' => 'post', 'id' =>
                        'purchase-report-form']) !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                        <input type="hidden" name="warehouse_id" value="0" />
                        <a id="purchase-report-link" href="">{{trans('Purchase Report')}}</a>
                        {!! Form::close() !!}
                    </li>
                    @endif
                    @if($customer_report_active)
                    <li id="customer-report-menu">
                        <a id="customer-report-link" href="">{{trans('Customer Report')}}</a>
                    </li>
                    @endif
                    @if($due_report_active)
                    <li id="due-report-menu">
                        {!! Form::open(['route' => 'report.customerDueByDate', 'method' => 'post', 'id' =>
                        'customer-due-report-form']) !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m-d', strtotime('-1 year'))}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                        <a id="due-report-link" href="">{{trans('Customer Due Report')}}</a>
                        {!! Form::close() !!}
                    </li>
                    @endif
                    @if($supplier_report_active)
                    <li id="supplier-report-menu">
                        <a id="supplier-report-link" href="">{{trans('Supplier Report')}}</a>
                    </li>
                    @endif
                    @if($supplier_due_report_active)
                    <li id="supplier-due-report-menu">
                        {!! Form::open(['route' => 'report.supplierDueByDate', 'method' => 'post', 'id' =>
                        'supplier-due-report-form']) !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m-d', strtotime('-1 year'))}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                        <a id="supplier-due-report-link" href="">{{trans('Supplier Due Report')}}</a>
                        {!! Form::close() !!}
                    </li>
                    @endif
                    @if($warehouse_report_active)
                    <li id="warehouse-report-menu">
                        <a id="warehouse-report-link" href="">{{trans('Warehouse Report')}}</a>
                    </li>
                    @endif
                    @if($warehouse_stock_report_active)
                    <li id="warehouse-stock-report-menu">
                        <a href="{{route('report.warehouseStock')}}">{{trans('Warehouse Stock Chart')}}</a>
                    </li>
                    @endif
                    @if($product_expiry_report_active)
                    <li id="productExpiry-report-menu">
                        <a href="{{route('report.productExpiry')}}">{{trans('Product Expiry Report')}}</a>
                    </li>
                    @endif
                    @if($product_qty_alert_active)
                    <li id="qtyAlert-report-menu">
                        <a href="{{route('report.qtyAlert')}}">{{trans('Product Quantity Alert')}}</a>
                    </li>
                    @endif
                    @if($dso_report_active)
                    <li id="daily-sale-objective-menu">
                        <a href="{{route('report.dailySaleObjective')}}">{{trans('Daily Sale Objective
                            Report')}}</a>
                    </li>
                    @endif
                    @if($user_report_active)
                    <li id="user-report-menu">
                        <a id="user-report-link" href="">{{trans('User Report')}}</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-gear"></i><span>{{trans('settings')}}</span></a>
                <ul id="setting" class="collapse list-unstyled ">
                    <?php
                        $all_notification_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'all_notification'],
                            ['role_id', $role->id]
                        ])->first();

                        $send_notification_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'send_notification'],
                            ['role_id', $role->id]
                        ])->first();

                        $warehouse_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'warehouse'],
                            ['role_id', $role->id]
                        ])->first();

                        $customer_group_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'customer_group'],
                            ['role_id', $role->id]
                        ])->first();

                        

                        $unit_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'unit'],
                            ['role_id', $role->id]
                        ])->first();

                        $currency_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'currency'],
                            ['role_id', $role->id]
                        ])->first();

                        $tax_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'tax'],
                            ['role_id', $role->id]
                        ])->first();

                        $general_setting_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'general_setting'],
                            ['role_id', $role->id]
                        ])->first();

                        $backup_database_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'backup_database'],
                            ['role_id', $role->id]
                        ])->first();

                        $mail_setting_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'mail_setting'],
                            ['role_id', $role->id]
                        ])->first();

                        $sms_setting_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'sms_setting'],
                            ['role_id', $role->id]
                        ])->first();

                        $create_sms_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'create_sms'],
                            ['role_id', $role->id]
                        ])->first();

                        $pos_setting_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'pos_setting'],
                            ['role_id', $role->id]
                        ])->first();

                        $hrm_setting_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'hrm_setting'],
                            ['role_id', $role->id]
                        ])->first();

                        $reward_point_setting_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                            ['permissions.name', 'reward_point_setting'],
                            ['role_id', $role->id]
                        ])->first();

                        $discount_plan_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                                ['permissions.name', 'discount_plan'],
                                ['role_id', $role->id]
                        ])->first();

                        $discount_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([
                                ['permissions.name', 'discount'],
                                ['role_id', $role->id]
                        ])->first();
                    ?>
                    @if($role->id <= 2) <li id="role-menu"><a href="{{route('role.index')}}">{{trans('Role
                            Permission')}}</a>
            </li>
            @endif
            @if($discount_plan_permission_active)
            <li id="discount-plan-list-menu"><a href="{{route('discount-plans.index')}}">{{trans('Discount
                    Plan')}}</a></li>
            @endif
            @if($discount_permission_active)
            <li id="discount-list-menu"><a href="{{route('discounts.index')}}">{{trans('Discount')}}</a></li>
            @endif
            @if($all_notification_permission_active)
            <li id="notification-list-menu">
                <a href="{{route('notifications.index')}}">{{trans('All Notification')}}</a>
            </li>
            @endif
            @if($send_notification_permission_active)
            <li id="notification-menu">
                <a href="" id="send-notification">{{trans('Send Notification')}}</a>
            </li>
            @endif
            @if($warehouse_permission_active)
            <li id="warehouse-menu"><a href="{{route('warehouse.index')}}">{{trans('Warehouse')}}</a></li>
            @endif
            @if($customer_group_permission_active)
            <li id="customer-group-menu"><a href="{{route('customer_group.index')}}">{{trans('Customer
                    Group')}}</a></li>
            @endif

            @if($unit_permission_active)
            <li id="unit-menu"><a href="{{route('unit.index')}}">{{trans('Unit')}}</a></li>
            @endif
            @if($currency_permission_active)
            <li id="currency-menu"><a href="{{route('currency.index')}}">{{trans('Currency')}}</a></li>
            @endif
            @if($tax_permission_active)
            <li id="tax-menu"><a href="{{route('tax.index')}}">{{trans('Tax')}}</a></li>
            @endif
            <li id="user-menu"><a href="{{route('user.profile', ['id' => Auth::id()])}}">{{trans('User
                    Profile')}}</a></li>
            @if($create_sms_permission_active)
            <li id="create-sms-menu"><a href="{{route('setting.createSms')}}">{{trans('Create SMS')}}</a></li>
            @endif
            @if($backup_database_permission_active)
            <li><a href="{{route('setting.backup')}}">{{trans('Backup Database')}}</a></li>
            @endif
            @if($general_setting_permission_active)
            <li id="general-setting-menu"><a href="{{route('setting.general')}}">{{trans('General Setting')}}</a>
            </li>
            @endif
            @if($mail_setting_permission_active)
            <li id="mail-setting-menu"><a href="{{route('setting.mail')}}">{{trans('Mail Setting')}}</a></li>
            @endif
            @if($reward_point_setting_permission_active)
            <li id="reward-point-setting-menu"><a href="{{route('setting.rewardPoint')}}">{{trans('Reward Point
                    Setting')}}</a></li>
            @endif
            @if($sms_setting_permission_active)
            <li id="sms-setting-menu"><a href="{{route('setting.sms')}}">{{trans('SMS Setting')}}</a></li>
            @endif
            @if($pos_setting_permission_active)
            <li id="pos-setting-menu"><a href="{{route('setting.pos')}}">POS {{trans('settings')}}</a></li>
            @endif
            @if($hrm_setting_permission_active)
            <li id="hrm-setting-menu"><a href="{{route('setting.hrm')}}"> {{trans('HRM Setting')}}</a></li>
            @endif
        </ul>
        {{-- @if(Auth::user()->role_id != 5)
        <li><a target="_blank" href="{{url('public/read_me')}}"> <i
                    class="dripicons-information"></i><span>{{trans('Documentation')}}</span></a></li>
        @endif --}}
            @php
            $subscription_permission_active = DB::table('permissions')
                     ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                     ->where([
                         ['permissions.name', 'subcription-index'],
                         ['role_id', $role->id] 
                     ])->first(); 
         @endphp
         @if ($subscription_permission_active)
      
        <li>
            <a href="#transfer1" aria-expanded="false" data-toggle="collapse"> <i
                    class="dripicons-export"></i><span>{{trans('Subscription')}}</span></a>
            <ul id="transfer1" class="collapse list-unstyled ">

                <li id=""><a href="{{route('plans.all.view')}}">{{trans('View Plans')}}</a></li>
                <li id=""><a href="{{route('subscriptions.all')}}">{{trans('View Subscriptions')}}</a></li>
            </ul>
        </li>
         @endif
    </nav>

    <div class="page">
        <!-- navbar-->
        <header class="container-fluid">
            <nav class="navbar">
                <a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a>


                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <?php
                $empty_database_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'empty_database'],
                        ['role_id', $role->id]
                ])->first();
            ?>
                    @if($sale_add_permission_active)
                    <li class="nav-item"><a class="dropdown-item btn-pos btn-sm" href="{{route('sale.pos')}}"><i
                                class="dripicons-shopping-bag"></i><span> POS</span></a></li>
                    @endif
                    <li class="nav-item"><a id="switch-theme" data-toggle="tooltip" title="{{trans('Switch Theme')}}"><i
                                class="dripicons-brightness-max"></i></a></li>
                    <li class="nav-item"><a id="btnFullscreen" data-toggle="tooltip" title="{{trans('Full Screen')}}"><i
                                class="dripicons-expand"></i></a></li>
                    @if(\Auth::user()->role_id <= 2) <li class="nav-item"><a href="{{route('cashRegister.index')}}"
                            data-toggle="tooltip" title="{{trans('Cash Register List')}}"><i
                                class="dripicons-archive"></i></a></li>
                        @endif
                        @if($product_qty_alert_active && ($alert_product + $dso_alert_product_no +
                        count(\Auth::user()->unreadNotifications)) > 0)
                        <li class="nav-item" id="notification-icon">
                            <a rel="nofollow" data-toggle="tooltip" title="{{__('Notifications')}}"
                                class="nav-link dropdown-item"><i class="dripicons-bell"></i><span
                                    class="badge badge-danger notification-number">{{$alert_product +
                                    $dso_alert_product_no + count(\Auth::user()->unreadNotifications)}}</span>
                            </a>
                            <ul class="right-sidebar">
                                <li class="notifications">
                                    <a href="{{route('report.qtyAlert')}}" class="btn btn-link"> {{$alert_product}}
                                        product exceeds alert quantity</a>
                                </li>
                                @if($dso_alert_product_no)
                                <li class="notifications">
                                    <a href="{{route('report.dailySaleObjective')}}" class="btn btn-link">
                                        {{$dso_alert_product_no}} product could not fulfill daily sale objective</a>
                                </li>
                                @endif
                                @foreach(\Auth::user()->unreadNotifications as $key => $notification)
                                <li class="notifications">
                                    @if($notification->data['document_name'])
                                    <a target="_blank"
                                        href="{{url('public/documents/notification', $notification->data['document_name'])}}"
                                        class="btn btn-link">{{ $notification->data['message'] }}</a>
                                    @else
                                    <a href="#" class="btn btn-link">{{ $notification->data['message'] }}</a>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        @if(count(\Auth::user()->unreadNotifications) > 0)
                        <li class="nav-item" id="notification-icon">
                            <a rel="nofollow" data-toggle="tooltip" title="{{__('Notifications')}}"
                                class="nav-link dropdown-item"><i class="dripicons-bell"></i><span
                                    class="badge badge-danger notification-number">{{count(\Auth::user()->unreadNotifications)}}</span>
                            </a>
                            <ul class="right-sidebar">
                                @foreach(\Auth::user()->unreadNotifications as $key => $notification)
                                <li class="notifications">
                                    @if($notification->data['document_name'])
                                    <a target="_blank"
                                        href="{{url('public/documents/notification', $notification->data['document_name'])}}"
                                        class="btn btn-link">{{ $notification->data['message'] }}</a>
                                    @else
                                    <a href="#" class="btn btn-link">{{ $notification->data['message'] }}</a>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a rel="nofollow" title="{{trans('file.language')}}" data-toggle="tooltip"
                                class="nav-link dropdown-item"><i class="dripicons-web"></i></a>
                            <ul class="right-sidebar">
                                <li>
                                    <a href="{{ url('language_switch/en') }}" class="btn btn-link"> English</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/es') }}" class="btn btn-link"> Español</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/ar') }}" class="btn btn-link"> عربى</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/s_chinese') }}" class="btn btn-link">中国人</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/t_chinese') }}" class="btn btn-link">中國人</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/pt_BR') }}" class="btn btn-link"> Portuguese</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/fr') }}" class="btn btn-link"> Français</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/de') }}" class="btn btn-link"> Deutsche</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/id') }}" class="btn btn-link"> Malay</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/hi') }}" class="btn btn-link"> हिंदी</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/vi') }}" class="btn btn-link"> Tiếng Việt</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/ru') }}" class="btn btn-link"> русский</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/bg') }}" class="btn btn-link"> български</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/tr') }}" class="btn btn-link"> Türk</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/it') }}" class="btn btn-link"> Italiano</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/nl') }}" class="btn btn-link"> Nederlands</a>
                                </li>
                                <li>
                                    <a href="{{ url('language_switch/lao') }}" class="btn btn-link"> Lao</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a rel="nofollow" data-toggle="tooltip" class="nav-link dropdown-item"><i
                                    class="dripicons-user"></i> <span>{{ucfirst(Auth::user()->name)}}</span> <i
                                    class="fa fa-angle-down"></i>
                            </a>
                            <ul class="right-sidebar">
                                <li>
                                    <a href="{{route('user.profile', ['id' => Auth::id()])}}"><i
                                            class="dripicons-user"></i> {{trans('profile')}}</a>
                                </li>
                                @if($general_setting_permission_active)
                                <li>
                                    <a href="{{route('setting.general')}}"><i class="dripicons-gear"></i>
                                        {{trans('settings')}}</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{url('my-transactions/'.date('Y').'/'.date('m'))}}"><i
                                            class="dripicons-swap"></i> {{trans('My Transaction')}}</a>
                                </li>
                                @if(Auth::user()->role_id != 5)
                                <li>
                                    <a href="{{url('holidays/my-holiday/'.date('Y').'/'.date('m'))}}"><i
                                            class="dripicons-vibrate"></i> {{trans('My Holiday')}}</a>
                                </li>
                                @endif
                                @if($empty_database_permission_active)
                                <li>
                                    <a onclick="return confirm('Are you sure want to delete? If you do this all of your data will be lost.')"
                                        href="{{route('setting.emptyDatabase')}}"><i class="dripicons-stack"></i>
                                        {{trans('Empty Database')}}</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i
                                            class="dripicons-power"></i>
                                        {{trans('logout')}}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                </ul>
            </nav>
        </header>
        <!-- notification modal -->
        <div id="notification-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('Send Notification')}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>{{trans('The field labels marked with * are required input
                                fields')}}.</small></p>
                        {!! Form::open(['route' => 'notifications.store', 'method' => 'post', 'files'=> true]) !!}
                        <div class="row">
                            <?php
                              $lims_user_list = DB::table('users')->where([
                                ['is_active', true],
                                ['id', '!=', \Auth::user()->id]
                              ])->get();
                          ?>
                            <div class="col-md-6 form-group">
                                <input type="hidden" name="sender_id" value="{{\Auth::id()}}">
                                <label>{{trans('User')}} *</label>
                                <select name="receiver_id" class="selectpicker form-control" required
                                    data-live-search="true" data-live-search-style="begins" title="Select user...">
                                    @foreach($lims_user_list as $user)
                                    <option value="{{$user->id}}">{{$user->name . ' (' . $user->email. ')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{trans('Attach Document')}}</label>
                                <input type="file" name="document" class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>{{trans('Message')}} *</label>
                                <textarea rows="5" name="message" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('submit')}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end notification modal -->

        <!-- expense modal -->
        <div id="expense-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('Add Expense')}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>{{trans('The field labels marked with * are required input
                                fields')}}.</small></p>
                        {!! Form::open(['route' => 'expenses.store', 'method' => 'post']) !!}
                        <?php
                      $lims_expense_category_list = DB::table('expense_categories')->where('is_active', true)->get();
                      if(Auth::user()->role_id > 2)
                        $lims_warehouse_list = DB::table('warehouses')->where([
                          ['is_active', true],
                          ['id', Auth::user()->warehouse_id]
                        ])->get();
                      else
                        $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                      $lims_account_list = \App\Account::where('is_active', true)->get();
                    ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>{{trans('Date')}}</label>
                                <input type="text" name="created_at" class="form-control date"
                                    placeholder="Choose date" />
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{trans('Expense Category')}} *</label>
                                <select name="expense_category_id" class="selectpicker form-control" required
                                    data-live-search="true" data-live-search-style="begins"
                                    title="Select Expense Category...">
                                    @foreach($lims_expense_category_list as $expense_category)
                                    <option value="{{$expense_category->id}}">{{$expense_category->name . ' (' .
                                        $expense_category->code. ')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{trans('Warehouse')}} *</label>
                                <select name="warehouse_id" class="selectpicker form-control" required
                                    data-live-search="true" data-live-search-style="begins" title="Select Warehouse...">
                                    @foreach($lims_warehouse_list as $warehouse)
                                    <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{trans('Amount')}} *</label>
                                <input type="number" name="amount" step="any" required class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> {{trans('Account')}}</label>
                                <select class="form-control selectpicker" name="account_id">
                                    @foreach($lims_account_list as $account)
                                    @if($account->is_default)
                                    <option selected value="{{$account->id}}">{{$account->name}}
                                        [{{$account->account_no}}]</option>
                                    @else
                                    <option value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{trans('Note')}}</label>
                            <textarea name="note" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('submit')}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end expense modal -->

        <!-- account modal -->
        <div id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('Add Account')}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>{{trans('The field labels marked with * are required input
                                fields')}}.</small></p>
                        {!! Form::open(['route' => 'accounts.store', 'method' => 'post']) !!}
                        <div class="form-group">
                            <label>{{trans('Account No')}} *</label>
                            <input type="text" name="account_no" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{trans('name')}} *</label>
                            <input type="text" name="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{trans('Initial Balance')}}</label>
                            <input type="number" name="initial_balance" step="any" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{trans('Note')}}</label>
                            <textarea name="note" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('submit')}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end account modal -->

        <!-- account statement modal -->
        <div id="account-statement-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('Account Statement')}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>{{trans('The field labels marked with * are required input
                                fields')}}.</small></p>
                        {!! Form::open(['route' => 'accounts.statement', 'method' => 'post']) !!}
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label> {{trans('Account')}}</label>
                                <select class="form-control selectpicker" name="account_id">
                                    @foreach($lims_account_list as $account)
                                    <option value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label> {{trans('Type')}}</label>
                                <select class="form-control selectpicker" name="type">
                                    <option value="0">{{trans('All')}}</option>
                                    <option value="1">{{trans('Debit')}}</option>
                                    <option value="2">{{trans('Credit')}}</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>{{trans('Choose Your Date')}}</label>
                                <div class="input-group">
                                    <input type="text" class="account-statement-daterangepicker-field form-control"
                                        required />
                                    <input type="hidden" name="start_date" />
                                    <input type="hidden" name="end_date" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('submit')}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end account statement modal -->

        <!-- warehouse modal -->
        <div id="warehouse-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('Warehouse Report')}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>{{trans('The field labels marked with * are required input
                                fields')}}.</small></p>
                        {!! Form::open(['route' => 'report.warehouse', 'method' => 'post']) !!}

                        <div class="form-group">
                            <label>{{trans('Warehouse')}} *</label>
                            <select name="warehouse_id" class="selectpicker form-control" required
                                data-live-search="true" id="warehouse-id" data-live-search-style="begins"
                                title="Select warehouse...">
                                @foreach($lims_warehouse_list as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('submit')}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end warehouse modal -->

        <!-- user modal -->
        <div id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('User Report')}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>{{trans('The field labels marked with * are required input
                                fields')}}.</small></p>
                        {!! Form::open(['route' => 'report.user', 'method' => 'post']) !!}
                        <?php
                      $lims_user_list = DB::table('users')->where('is_active', true)->get();
                    ?>
                        <div class="form-group">
                            <label>{{trans('User')}} *</label>
                            <select name="user_id" class="selectpicker form-control" required data-live-search="true"
                                id="user-id" data-live-search-style="begins" title="Select user...">
                                @foreach($lims_user_list as $user)
                                <option value="{{$user->id}}">{{$user->name . ' (' . $user->phone. ')'}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('submit')}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end user modal -->

        <!-- customer modal -->
        <div id="customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('Customer Report')}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>{{trans('The field labels marked with * are required input
                                fields')}}.</small></p>
                        {!! Form::open(['route' => 'report.customer', 'method' => 'post']) !!}
                        <?php
                      $lims_customer_list = DB::table('customers')->where('is_active', true)->get();
                    ?>
                        <div class="form-group">
                            <label>{{trans('customer')}} *</label>
                            <select name="customer_id" class="selectpicker form-control" required
                                data-live-search="true" id="customer-id" data-live-search-style="begins"
                                title="Select customer...">
                                @foreach($lims_customer_list as $customer)
                                <option value="{{$customer->id}}">{{$customer->name . ' (' . $customer->phone_number.
                                    ')'}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('submit')}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end customer modal -->

        <!-- supplier modal -->
        <div id="supplier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
            class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{trans('Supplier Report')}}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic"><small>{{trans('The field labels marked with * are required input
                                fields')}}.</small></p>
                        {!! Form::open(['route' => 'report.supplier', 'method' => 'post']) !!}
                        <?php
                      $lims_supplier_list = DB::table('suppliers')->where('is_active', true)->get();
                    ?>
                        <div class="form-group">
                            <label>{{trans('Supplier')}} *</label>
                            <select name="supplier_id" class="selectpicker form-control" required
                                data-live-search="true" id="supplier-id" data-live-search-style="begins"
                                title="Select Supplier...">
                                @foreach($lims_supplier_list as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name . ' (' . $supplier->phone_number.
                                    ')'}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('submit')}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end supplier modal -->

        <div style="display:none" id="content" class="animate-bottom">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <p>&copy; {{$general_setting->site_title}}
                             {{-- | {{trans('Developed')}} {{trans('By')}}
                            <span class="external">{{$general_setting->developed_by}}</span>  --}}
                            | V 3.8
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @if(!config('database.connections.saleprosaas_landlord'))
    <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery-ui.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery/bootstrap-datepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery.timepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/popper.js/umd/popper.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('vendor/bootstrap/js/bootstrap-select.min.js') ?>"></script>

    <script type="text/javascript" src="<?php echo asset('js/grasp_mobile_progress_circle-1.0.0.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery.cookie/jquery.cookie.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('vendor/chart.js/Chart.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/charts-custom.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery-validation/jquery.validate.min.js') ?>">
    </script>
    <script type="text/javascript"
        src="<?php echo asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>">
    </script>
    @if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
    <script type="text/javascript" src="<?php echo asset('js/front_rtl.js') ?>"></script>
    @else
    <script type="text/javascript" src="<?php echo asset('js/front.js') ?>"></script>
    @endif

    @if(Route::current()->getName() != '/')
    <script type="text/javascript" src="<?php echo asset('vendor/daterange/js/moment.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/daterange/js/knockout-3.4.2.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/daterange/js/daterangepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/dropzone.js') ?>"></script>

    <!-- table sorter js-->
    @if( Config::get('app.locale') == 'ar')
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/pdfmake_arabic.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/vfs_fonts_arabic.js') ?>"></script>
    @else
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/pdfmake.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/vfs_fonts.js') ?>"></script>
    @endif
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/dataTables.bootstrap4.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/dataTables.buttons.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/jszip.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.bootstrap4.min.js') ?>">
        ">
    </script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.colVis.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.html5.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.printnew.js') ?>"></script>

    <script type="text/javascript" src="<?php echo asset('vendor/datatable/sum().js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/dataTables.checkboxes.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js">
    </script>
    @endif
    @else
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery-ui.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/bootstrap-datepicker.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery.timepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/popper.js/umd/popper.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript"
        src="<?php echo asset('../../vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/bootstrap/js/bootstrap-select.min.js') ?>">
    </script>

    <script type="text/javascript" src="<?php echo asset('../../js/grasp_mobile_progress_circle-1.0.0.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery.cookie/jquery.cookie.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/chart.js/Chart.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../js/charts-custom.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery-validation/jquery.validate.min.js') ?>">
    </script>
    <script type="text/javascript"
        src="<?php echo asset('../../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>">
    </script>
    @if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
    <script type="text/javascript" src="<?php echo asset('../../js/front_rtl.js') ?>"></script>
    @else
    <script type="text/javascript" src="<?php echo asset('../../js/front.js') ?>"></script>
    @endif

    @if(Route::current()->getName() != '/')
    <script type="text/javascript" src="<?php echo asset('../../vendor/daterange/js/moment.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/daterange/js/knockout-3.4.2.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/daterange/js/daterangepicker.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../js/dropzone.js') ?>"></script>

    <!-- table sorter js-->
    @if( Config::get('app.locale') == 'ar')
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/pdfmake_arabic.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/vfs_fonts_arabic.js') ?>"></script>
    @else
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/pdfmake.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/vfs_fonts.js') ?>"></script>
    @endif
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/jquery.dataTables.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/dataTables.bootstrap4.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/dataTables.buttons.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.bootstrap4.min.js') ?>">
        ">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.colVis.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.html5.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.printnew.js') ?>"></script>

    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/sum().js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/dataTables.checkboxes.min.js') ?>">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js">
    </script>
    @endif
    @endif
    @stack('scripts')
    <script>
        if ('serviceWorker' in navigator ) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/salepro/service-worker.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
    <script type="text/javascript">
        var theme = <?php echo json_encode($theme); ?>;
        if(theme == 'dark') {
            $('body').addClass('dark-mode');
            $('#switch-theme i').addClass('dripicons-brightness-low');
        }
        else {
            $('body').removeClass('dark-mode');
            $('#switch-theme i').addClass('dripicons-brightness-max');
        }
        $('#switch-theme').click(function() {
            if(theme == 'light') {
                theme = 'dark';
                var url = <?php echo json_encode(route('switchTheme', 'dark')); ?>;
                $('body').addClass('dark-mode');
                $('#switch-theme i').addClass('dripicons-brightness-low');
            }
            else {
                theme = 'light';
                var url = <?php echo json_encode(route('switchTheme', 'light')); ?>;
                $('body').removeClass('dark-mode');
                $('#switch-theme i').addClass('dripicons-brightness-max');
            }

            $.get(url, function(data) {
                console.log('theme changed to '+theme);
            });
        });

        var alert_product = <?php echo json_encode($alert_product) ?>;

      if ($(window).outerWidth() > 1199) {
          $('nav.side-navbar').removeClass('shrink');
      }
      
      function myFunction() {
          setTimeout(showPage, 100);
      }

      function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("content").style.display = "block";
      }

      $("div.alert").delay(4000).slideUp(800);

      function confirmDelete() {
          if (confirm("Are you sure want to delete?")) {
              return true;
          }
          return false;
      }

      $("li#notification-icon").on("click", function (argument) {
          $.get('notifications/mark-as-read', function(data) {
              $("span.notification-number").text(alert_product);
          });
      });

      $("a#add-expense").click(function(e){
        e.preventDefault();
        $('#expense-modal').modal();
      });

      $("a#send-notification").click(function(e){
        e.preventDefault();
        $('#notification-modal').modal();
      });

      $("a#add-account").click(function(e){
        e.preventDefault();
        $('#account-modal').modal();
      });

      $("a#account-statement").click(function(e){
        e.preventDefault();
        $('#account-statement-modal').modal();
      });

      $("a#profitLoss-link").click(function(e){
        e.preventDefault();
        $("#profitLoss-report-form").submit();
      });

      $("a#report-link").click(function(e){
        e.preventDefault();
        $("#product-report-form").submit();
      });

      $("a#purchase-report-link").click(function(e){
        e.preventDefault();
        $("#purchase-report-form").submit();
      });

      $("a#sale-report-link").click(function(e){
        e.preventDefault();
        $("#sale-report-form").submit();
      });
      $("a#sale-report-chart-link").click(function(e){
        e.preventDefault();
        $("#sale-report-chart-form").submit();
      });

      $("a#payment-report-link").click(function(e){
        e.preventDefault();
        $("#payment-report-form").submit();
      });

      $("a#warehouse-report-link").click(function(e){
        e.preventDefault();
        $('#warehouse-modal').modal();
      });

      $("a#user-report-link").click(function(e){
        e.preventDefault();
        $('#user-modal').modal();
      });

      $("a#customer-report-link").click(function(e){
        e.preventDefault();
        $('#customer-modal').modal();
      });

      $("a#supplier-report-link").click(function(e){
        e.preventDefault();
        $('#supplier-modal').modal();
      });

      $("a#due-report-link").click(function(e){
        e.preventDefault();
        $("#customer-due-report-form").submit();
      });

      $("a#supplier-due-report-link").click(function(e){
        e.preventDefault();
        $("#supplier-due-report-form").submit();
      });

      $(".account-statement-daterangepicker-field").daterangepicker({
          callback: function(startDate, endDate, period){
            var start_date = startDate.format('YYYY-MM-DD');
            var end_date = endDate.format('YYYY-MM-DD');
            var title = start_date + ' To ' + end_date;
            $(this).val(title);
            $('#account-statement-modal input[name="start_date"]').val(start_date);
            $('#account-statement-modal input[name="end_date"]').val(end_date);
          }
      });

      $('.date').datepicker({
         format: "dd-mm-yyyy",
         autoclose: true,
         todayHighlight: true
       });

      $('.selectpicker').selectpicker({
          style: 'btn-link',
      });
    </script>
</body>

</html>