<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{url('/')}}" class="logo logo-dark">
            @if($general_setting->site_logo)
            <span class="logo-sm">
                <img src="{{url('logo', $general_setting->site_logo)}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{url('logo', $general_setting->site_logo)}}" alt="" height="17">
            </span>
            @else
            <h1 class="d-inline">{{$general_setting->site_title}}</h1>
            @endif
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            @if($general_setting->site_logo)
            <span class="logo-sm">
                <img src="{{url('logo', $general_setting->site_logo)}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{url('logo', $general_setting->site_logo)}}" alt="" height="17">
            </span>
            @else
            <h1 class="d-inline">{{$general_setting->site_title}}</h1>
            @endif
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>{{__('Menu')}}</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('/')}}">
                        <i class="bx bxs-dashboard"></i> <span>{{__('Dashboard')}}</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
            {{-- Product --}}
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
                @if($category_permission_active || $index_permission_active || $print_barcode_active ||
                $stock_count_active
                || $adjustment_active)
        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="bx bx-layer"></i> <span>{{__('Product')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            @if($category_permission_active)
                            <li class="nav-item">
                                <a href="{{route('category.index')}}" class="nav-link">{{__('Category')}}</a>
                            </li>
                            @endif
                            @if($brand_permission_active)
                            <li class="nav-item">
                                <a href="{{route('brand.index')}}" class="nav-link">{{__('Brand')}}</a>
                            </li>
                            @endif
                            @if($index_permission_active)
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link"> <span>{{__('Product
                                        List')}}</span></a>
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
                            <li class="nav-item">
                                <a href="{{route('products.create')}}" class="nav-link"> <span>{{__('Add
                                        Product')}}</span></a>
                            </li>
                            @endif
                            @endif
                            @if($print_barcode_active)
                            <li class="nav-item">
                                <a href="{{route('product.printBarcode')}}" class="nav-link">{{__('Print Barcode')}}</a>
                            </li>
                            @endif
                            @if($adjustment_active)
                            <li class="nav-item">
                                <a href="{{route('qty_adjustment.index')}}" class="nav-link">{{__('Adjustment
                                    List')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('qty_adjustment.create')}}" class="nav-link">{{__('Add
                                    Adjustment')}}</a>
                            </li>
                            @endif
                            @if($stock_count_active)
                            <li class="nav-item">
                                <a href="{{route('stock-count.index')}}" class="nav-link">{{__('Stock Count')}}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
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
    @if($category_permission_active || $index_permission_active || $print_barcode_active ||
    $stock_count_active
    || $adjustment_active)
<li class="nav-item">
<a class="nav-link menu-link" href="#sidebarRepairs" data-bs-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="sidebarRepairs">
            <i class="bx bx-layer"></i> <span>{{__('Repairs')}}</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarRepairs">
            <ul class="nav nav-sm flex-column">
                
                <li class="nav-item">
                    <a href="{{route('repairs.manage')}}" class="nav-link">{{__('Manage Tickets ')}}</a>
                </li>
               
            </ul>
        </div>
    </li>
    @endif



























































































                @if($index_permission_active)
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps1" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps1">
                        <i class="bx bx-credit-card"></i> <span>{{__('Purchase')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('purchases.index')}}" class="nav-link">{{__('Purchase List')}}</a>
                            </li>
                            <?php
                                $add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([
                                        ['permissions.name', 'purchases-add'],
                                        ['role_id', $role->id] 
                                    ])->first();
                            ?>
                            @if($add_permission_active)
                            <li class="nav-item">
                                <a href="{{route('purchases.create')}}" class="nav-link">{{__('Add Purchase')}}</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('purchases/purchase_by_csv')}}" class="nav-link"> <span>{{__('Import
                                        Purchase By
                                        CSV')}}</span></a>
                            </li>
                            @endif
                        </ul>
                    </div>
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
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps2" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps2">
                        <i class="bx bx-cart"></i> <span>{{__('Sale')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps2">
                        <ul class="nav nav-sm flex-column">
                            @if($sale_index_permission_active)
                            <li class="nav-item">
                                <a href="{{route('sales.index')}}" class="nav-link">{{__('Sale List')}}</a>
                            </li>
                            @if($sale_add_permission_active)
                            <li class="nav-item">
                                <a href="{{route('sale.pos')}}" class="nav-link">{{__('POS')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('sales.create')}}" class="nav-link">{{__('Add Sale')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('sales/sale_by_csv')}}" class="nav-link"> <span>{{__('Import Sale By
                                        CSV')}}</span></a>
                            </li>
                            @endif
                            @endif
                            @if($gift_card_permission_active)
                            <li class="nav-item">
                                <a href="{{route('gift_cards.index')}}" class="nav-link">{{__('Gift Card List')}}</a>
                            </li>
                            @endif
                            @if($coupon_permission_active)
                            <li class="nav-item">
                                <a href="{{route('coupons.index')}}" class="nav-link">{{__('Coupon List')}}</a>
                            </li>
                            @endif
                            @if($delivery_permission_active)
                            <li class="nav-item">
                                <a href="{{route('delivery.index')}}" class="nav-link">{{__('Delivery List')}}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
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
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps3" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps3">
                        <i class="bx bx-wallet"></i> <span>{{__('Expense')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('expense_categories.index')}}" class="nav-link">{{__('Expense
                                    Category')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('expenses.index')}}" class="nav-link">{{__('Expense List')}}</a>
                            </li>
                            <?php
                                $add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([
                                        ['permissions.name', 'expenses-add'],
                                        ['role_id', $role->id] 
                                    ])->first();
                            ?>
                            @if($add_permission_active)
                            <li class="nav-item">
                                <a href="" class="nav-link">{{__('Add Expense')}}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
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
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps4" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps4">
                        <i class="bx bx-file"></i> <span>{{__('Quotation')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('quotations.index')}}" class="nav-link">{{__('Quotation List')}}</a>
                            </li>
                            <?php
                                $add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([
                                        ['permissions.name', 'quotes-add'],
                                        ['role_id', $role->id] 
                                    ])->first();
                            ?>
                            @if($add_permission_active)
                            <li class="nav-item">
                                <a href="{{route('quotations.create')}}" class="nav-link">{{__('Add Quotation')}}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
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
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps5" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps5">
                        <i class="bx bx-export"></i> <span>{{__('Transfer')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('transfers.index')}}" class="nav-link">{{__('Transfer List')}}</a>
                            </li>
                            <?php
                                $add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([
                                        ['permissions.name', 'transfers-add'],
                                        ['role_id', $role->id] 
                                    ])->first();
                            ?>
                            @if($add_permission_active)
                            <li class="nav-item">
                                <a href="{{route('transfers.create')}}" class="nav-link">{{__('Add Transfer')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('transfers/transfer_by_csv')}}" class="nav-link">{{__('Import Transfer By
                                    CSV')}}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
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
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps6" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps6">
                        <i class="bx bx-share"></i> <span>{{__('Return')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps6">
                        <ul class="nav nav-sm flex-column">
                            @if($sale_return_index_permission_active)
                            <li class="nav-item">
                                <a href="{{route('return-sale.index')}}" class="nav-link">{{__('Sale')}}</a>
                            </li>
                            @endif
                            @if($purchase_return_index_permission_active)
                            <li class="nav-item">
                                <a href="{{route('return-purchase.index')}}" class="nav-link">{{__('Purchase')}}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
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
                @if($user_index_permission_active || $customer_index_permission_active ||
                $biller_index_permission_active ||
                $supplier_index_permission_active)
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps7" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps7">
                        <i class="bx bx-user"></i> <span>{{__('People')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps7">
                        <ul class="nav nav-sm flex-column">
                            @if($user_index_permission_active)
                            <li class="nav-item">
                                <a href="{{route('user.index')}}" class="nav-link">{{__('User List')}}</a>
                            </li>
                            <?php
                                $user_add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([
                                        ['permissions.name', 'users-add'],
                                        ['role_id', $role->id] 
                                    ])->first();
                            ?>
                            @if($user_add_permission_active)
                            <li class="nav-item">
                                <a href="{{route('user.create')}}" class="nav-link">{{__('Add User')}}</a>
                            </li>
                            @endif
                            @endif
                            @if($customer_index_permission_active)
                            <li class="nav-item">
                                <a href="{{route('customer.index')}}" class="nav-link">{{__('Customer List')}}</a>
                            </li>
                            <?php
                                $customer_add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([
                                        ['permissions.name', 'customers-add'],
                                        ['role_id', $role->id] 
                                    ])->first();
                            ?>
                            @if($customer_add_permission_active)
                            <li class="nav-item">
                                <a href="{{route('customer.create')}}" class="nav-link">{{__('Add Customer')}}</a>
                            </li>
                            @endif
                            @endif
                            @if($biller_index_permission_active)
                            <li class="nav-item">
                                <a href="{{route('biller.index')}}" class="nav-link">{{__('Biller List')}}</a>
                            </li>
                            <?php
                                $biller_add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([
                                        ['permissions.name', 'billers-add'],
                                        ['role_id', $role->id] 
                                    ])->first();
                            ?>
                            @if($biller_add_permission_active)
                            <li class="nav-item">
                                <a href="{{route('biller.create')}}" class="nav-link">{{__('Add Biller')}}</a>
                            </li>
                            @endif
                            @endif
                            @if($supplier_index_permission_active)
                            <li class="nav-item">
                                <a href="{{route('supplier.index')}}" class="nav-link">{{__('Supplier List')}}</a>
                            </li>
                            <?php
                                $supplier_add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([
                                        ['permissions.name', 'suppliers-add'],
                                        ['role_id', $role->id] 
                                    ])->first();
                            ?>
                            @if($supplier_add_permission_active)
                            <li class="nav-item">
                                <a href="{{route('supplier.create')}}" class="nav-link">{{__('Add Supplier')}}</a>
                            </li>
                            @endif
                            @endif
                        </ul>
                    </div>
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
                @if($profit_loss_active || $best_seller_active || $warehouse_report_active ||
                $warehouse_stock_report_active
                || $product_report_active || $daily_sale_active || $monthly_sale_active || $daily_purchase_active ||
                $monthly_purchase_active || $purchase_report_active || $sale_report_active || $sale_report_chart_active
                ||
                $payment_report_active || $product_expiry_report_active || $product_qty_alert_active ||
                $dso_report_active
                || $user_report_active || $customer_report_active || $supplier_report_active || $due_report_active ||
                $supplier_due_report_active)
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps8" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps8">
                        <i class="bx bx-table"></i> <span>{{__('Report')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps8">
                        <ul class="nav nav-sm flex-column">
                            @if($profit_loss_active)
                            <li class="nav-item">
                                {!! Form::open(['route' => 'report.profitLoss', 'method' => 'post', 'id' =>
                                'profitLoss-report-form']) !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <a id="profitLoss-link" href="" class="nav-link">{{__('Summary Report')}}</a>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            @if($best_seller_active)
                            <li class="nav-item">
                                <a href="{{url('report/best_seller')}}" class="nav-link">{{__('Best Seller')}}</a>
                            </li>
                            @endif
                            @if($product_report_active)
                            <li class="nav-item">
                                {!! Form::open(['route' => 'report.product', 'method' => 'get', 'id' =>
                                'product-report-form'])
                                !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="warehouse_id" value="0" />
                                <a id="report-link" class="nav-link">{{__('Product Report')}}</a>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            @if($daily_sale_active)
                            <li class="nav-item">
                                <a href="{{url('report/daily_sale/'.date('Y').'/'.date('m'))}}"
                                    class="nav-link">{{__('Daily Sale')}}</a>
                            </li>
                            @endif
                            @if($monthly_sale_active)
                            <li class="nav-item">
                                <a href="{{url('report/monthly_sale/'.date('Y'))}}" class="nav-link">{{__('Monthly
                                    Sale')}}</a>
                            </li>
                            @endif
                            @if($daily_purchase_active)
                            <li class="nav-item">
                                <a href="{{url('report/daily_purchase/'.date('Y').'/'.date('m'))}}"
                                    class="nav-link">{{__('Daily Purchase')}}</a>
                            </li>
                            @endif
                            @if($monthly_purchase_active)
                            <li class="nav-item">
                                <a href="{{url('report/monthly_purchase/'.date('Y'))}}" class="nav-link">{{__('Monthly
                                    Purchase')}}</a>
                            </li>
                            @endif
                            @if($sale_report_active)
                            <li class="nav-item">
                                {!! Form::open(['route' => 'report.sale', 'method' => 'post', 'id' =>
                                'sale-report-form']) !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="warehouse_id" value="0" />
                                <a id="sale-report-link" class="nav-link">{{__('Sale Report')}}</a>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            @if($sale_report_chart_active)
                            <li class="nav-item">
                                {!! Form::open(['route' => 'report.saleChart', 'method' => 'post', 'id' =>
                                'sale-report-chart-form']) !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="warehouse_id" value="0" />
                                <input type="hidden" name="time_period" value="weekly" />
                                <a id="sale-report-chart-link" class="nav-link">{{__('Sale Report Chart')}}</a>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            @if($payment_report_active)
                            <li class="nav-item">
                                {!! Form::open(['route' => 'report.paymentByDate', 'method' => 'post', 'id' =>
                                'payment-report-form']) !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <a id="payment-report-link" class="nav-link">{{__('Payment Report')}}</a>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            @if($purchase_report_active)
                            <li class="nav-item">
                                {!! Form::open(['route' => 'report.purchase', 'method' => 'post', 'id' =>
                                'purchase-report-form']) !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m').'-'.'01'}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="warehouse_id" value="0" />
                                <a id="purchase-report-link" class="nav-link">{{__('Purchase Report')}}</a>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            @if($customer_report_active)
                            <li class="nav-item">
                                <a id="customer-report-link" class="nav-link">{{__('Customer Report')}}</a>
                            </li>
                            @endif
                            @if($due_report_active)
                            <li class="nav-item">
                                {!! Form::open(['route' => 'report.customerDueByDate', 'method' => 'post', 'id' =>
                        'customer-due-report-form']) !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m-d', strtotime('-1 year'))}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <a id="due-report-link" class="nav-link">{{__('Customer Due Report')}}</a>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            @if($supplier_report_active)
                            <li class="nav-item">
                                <a id="supplier-report-link" class="nav-link">{{__('Supplier Report')}}</a>
                            </li>
                            @endif
                            @if($supplier_due_report_active)
                            <li class="nav-item">
                                {!! Form::open(['route' => 'report.supplierDueByDate', 'method' => 'post', 'id' =>
                        'supplier-due-report-form']) !!}
                        <input type="hidden" name="start_date" value="{{date('Y-m-d', strtotime('-1 year'))}}" />
                        <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <a id="supplier-due-report-link" class="nav-link">{{__('Supplier Due Report')}}</a>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            @if($warehouse_report_active)
                            <li class="nav-item">
                                <a id="warehouse-report-link" class="nav-link">{{__('Warehouse Report')}}</a>
                            </li>
                            @endif
                            @if($warehouse_stock_report_active)
                            <li class="nav-item">
                                <a href="{{route('report.warehouseStock')}}" class="nav-link">{{__('Warehouse Stock Chart')}}</a>
                            </li>
                            @endif
                            @if($product_expiry_report_active)
                            <li class="nav-item">
                                <a href="{{route('report.productExpiry')}}" class="nav-link">{{__('Product Expiry Report')}}</a>
                            </li>
                            @endif
                            @if($product_qty_alert_active)
                            <li class="nav-item">
                                <a href="{{route('report.qtyAlert')}}" class="nav-link">{{__('Product Quantity Alert')}}</a>
                            </li>
                            @endif
                            @if($dso_report_active)
                            <li class="nav-item">
                                <a href="{{route('report.dailySaleObjective')}}" class="nav-link">{{__('Daily Sale Objective Report')}}</a>
                            </li>
                            @endif
                            @if($user_report_active)
                            <li class="nav-item">
                                <a id="user-report-link" class="nav-link">{{__('User Report')}}</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps9" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps9">
                        <i class="bx bx-cog"></i> <span>{{__('Settings')}}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps9">
                        <ul class="nav nav-sm flex-column">
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
                            @if($role->id <= 2) <li class="nav-item">
                                <a href="{{route('role.index')}}" class="nav-link">{{__('Role Permission')}}</a>
                </li>
                @endif
                @if($discount_plan_permission_active)
                <li class="nav-item">
                    <a href="{{route('discount-plans.index')}}" class="nav-link">{{__('Discount Plan')}}</a>
                </li>
                @endif
                @if($discount_permission_active)
                <li class="nav-item">
                    <a href="{{route('discounts.index')}}" class="nav-link">{{__('Discount')}}</a>
                </li>
                @endif
                @if($all_notification_permission_active)
                <li class="nav-item">
                    <a href="{{route('notifications.index')}}" class="nav-link">{{__('All Notification')}}</a>
                </li>
                @endif
                @if($send_notification_permission_active)
                <li class="nav-item">
                    <a id="send-notification" class="nav-link">{{__('Send Notification')}}</a>
                </li>
                @endif
                @if($warehouse_permission_active)
                <li class="nav-item">
                    <a href="{{route('warehouse.index')}}" class="nav-link">{{__('Warehouse')}}</a>
                </li>
                @endif
                @if($customer_group_permission_active)
                <li class="nav-item">
                    <a href="{{route('customer_group.index')}}" class="nav-link">{{__('Customer Group')}}</a>
                </li>
                @endif

                @if($unit_permission_active)
                <li class="nav-item">
                    <a href="{{route('unit.index')}}" class="nav-link">{{__('Unit')}}</a>
                </li>
                @endif
                @if($currency_permission_active)
                <li class="nav-item">
                    <a href="{{route('currency.index')}}" class="nav-link">{{__('Currency')}}</a>
                </li>
                @endif
                @if($tax_permission_active)
                <li class="nav-item">
                    <a href="{{route('tax.index')}}" class="nav-link">{{__('Tax')}}</a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('user.profile', ['id' => Auth::id()])}}" class="nav-link">{{__('User
                        Profile')}}</a>
                </li>
                @if($create_sms_permission_active)
                <li class="nav-item">
                    <a href="{{route('setting.createSms')}}" class="nav-link">{{__('Create SMS')}}</a>
                </li>
                @endif
                @if($backup_database_permission_active)
                <li class="nav-item">
                    <a href="{{route('setting.backup')}}" class="nav-link">{{__('Backup Database')}}</a>
                </li>
                @endif
                @if($general_setting_permission_active)
                <li class="nav-item">
                    <a href="{{route('setting.general')}}" class="nav-link">{{__('General Setting')}}</a>
                </li>
                @endif
                @if($mail_setting_permission_active)
                <li class="nav-item">
                    <a href="{{route('setting.mail')}}" class="nav-link">{{__('Mail Setting')}}</a>
                </li>
                @endif
                @if($reward_point_setting_permission_active)
                <li class="nav-item">
                    <a href="{{route('setting.rewardPoint')}}" class="nav-link">{{__('Reward Point Setting')}}</a>
                </li>
                @endif
                @if($sms_setting_permission_active)
                <li class="nav-item">
                    <a href="{{route('setting.sms')}}" class="nav-link">{{__('SMS Setting')}}</a>
                </li>
                @endif
                @if($pos_setting_permission_active)
                <li class="nav-item">
                    <a href="{{route('setting.pos')}}" class="nav-link">{{__('POS Setting')}}</a>
                </li>
                @endif
                @if($hrm_setting_permission_active)
                <li class="nav-item">
                    <a href="{{route('setting.hrm')}}" class="nav-link">{{__('HRM Setting')}}</a>
                </li>
                @endif
            </ul>
        </div>
        </li>
        @php
           $subscription_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'subcription-index'],
                        ['role_id', $role->id] 
                    ])->first(); 
        @endphp
        @if ($subscription_permission_active)
        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarApps34" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarApps34">
                <i class="bx bx-layer"></i> <span>Subscription</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarApps34">
                <ul class="nav nav-sm flex-column">

                    <li class="nav-item">
                        <a href="{{route('plans.all.view')}}" class="nav-link">View Plans</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('subscriptions.all')}}" class="nav-link">View Subscriptions</a>
                    </li>
                    
                </ul>
            </div>
        </li> 
        @endif
        
        </ul>
    </div>
    <!-- Sidebar -->
</div>
<div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>