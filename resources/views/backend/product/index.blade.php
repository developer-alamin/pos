@extends('backend.layout.master')
@section('title') Product @endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('li_1') Product @endslot
    @slot('title')Product List @endslot
@endcomponent
@if(session()->has('create_message'))
    <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('create_message') }}</div>
@endif
@if(session()->has('edit_message'))
    <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('edit_message') }}</div>
@endif
@if(session()->has('import_message'))
    <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('import_message') }}</div>
@endif
@if(session()->has('not_permitted'))
    <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
@if(session()->has('message'))
    <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-0">Product Table</h5>
                    <div>
                        <a href="{{route('products.create')}}" class="btn btn-primary"><i class="bx bx-plus"></i>&nbsp; Add New</a>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importProduct"><i class="dripicons-copy"></i>
                            Import Category</button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                    <thead>
                    <tr>
                        <th class="not-exported"></th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Cost</th>
                        <th>Stock Worth (Price/Cost)</th>
                        <th class="not-exported">Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th class="not-exported"></th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Cost</th>
                        <th>Stock Worth (Price/Cost)</th>
                        <th class="not-exported">Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="importProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        {!! Form::open(['route' => 'product.import', 'method' => 'post', 'files' => true]) !!}
        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title">Import Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
           <p>{{trans('file.The correct column order is')}} (image, name*, code*, type*, brand, category*, unit_code*, cost*, price*, product_details, variant_name, item_code, additional_price) {{trans('file.and you must follow this')}}.</p>
           <p>{{trans('file.To display Image it must be stored in')}} public/images/product {{trans('file.directory')}}. {{trans('file.Image name must be same as product name')}}</p>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('file.Upload CSV File')}} *</label>
                        {{Form::file('file', array('class' => 'form-control','required'))}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> {{trans('file.Sample File')}}</label>
                        <a href="public/sample_file/sample_products.csv" class="btn btn-info btn-block btn-md"><i class="dripicons-download"></i>  {{trans('file.Download')}}</a>
                    </div>
                </div>
           </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary mt-2'])}}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>

<div id="product-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title">{{trans('Product Details')}}</h5>
          <button id="print-btn" type="button" class="btn btn-default btn-sm ml-3"><i class="dripicons-print"></i> {{trans('file.Print')}}</button>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-5" id="slider-content"></div>
                <div class="col-md-5 offset-1" id="product-content"></div>
                @if($role_id <= 2)
                <div class="col-md-12 mt-2" id="product-warehouse-section">
                    <h5>{{trans('file.Warehouse Quantity')}}</h5>
                    <table class="table table-bordered table-hover product-warehouse-list">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                @endif
                <div class="col-md-7 mt-2" id="product-variant-section">
                    <h5>{{trans('file.Product Variant Information')}}</h5>
                    <table class="table table-bordered table-hover product-variant-list">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                @if($role_id <= 2)
                <div class="col-md-5 mt-2" id="product-variant-warehouse-section">
                    <h5>{{trans('file.Warehouse quantity of product variants')}}</h5>
                    <table class="table table-bordered table-hover product-variant-warehouse-list">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                @endif
            </div>

            <h5 id="combo-header"></h5>
            <table class="table table-bordered table-hover item-list">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>

    function confirmDelete() {
        if (confirm("Are you sure want to delete?")) {
            return true;
        }
        return false;
    }

    var warehouse = [];
    var variant = [];
    var qty = [];
    var htmltext;
    var slidertext;
    var product_id = [];
    var all_permission = <?php echo json_encode($all_permission) ?>;
    var role_id = <?php echo json_encode($role_id) ?>;
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;
    var logoUrl = <?php echo json_encode(url('public/logo', $general_setting->site_logo)) ?>;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( "#select_all" ).on( "change", function() {
        if ($(this).is(':checked')) {
            $("tbody input[type='checkbox']").prop('checked', true);
        }
        else {
            $("tbody input[type='checkbox']").prop('checked', false);
        }
    });

    $(document).on("click", "tr.product-link td:not(:first-child, :last-child)", function() {
        productDetails( $(this).parent().data('product'), $(this).parent().data('imagedata') );
    });

    $(document).on("click", ".view", function(){
        var product = $(this).parent().parent().parent().parent().parent().data('product');
        var imagedata = $(this).parent().parent().parent().parent().parent().data('imagedata');
        productDetails(product, imagedata);
    });

    $("#print-btn").on("click", function() {
          var divToPrint=document.getElementById('product-details');
          var newWin=window.open('','Print-Window');
          newWin.document.open();
          newWin.document.write('<link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css"><style type="text/css">@media print {.modal-dialog { max-width: 1000px;} }</style><body onload="window.print()">'+divToPrint.innerHTML+'</body>');
          newWin.document.close();
          setTimeout(function(){newWin.close();},10);
    });

    function productDetails(product, imagedata) {
        product[11] = product[11].replace(/@/g, '"');
        htmltext = slidertext = '';

        htmltext = '<p><strong>{{trans("file.Type")}}: </strong>'+product[0]+'</p><p><strong>{{trans("file.name")}}: </strong>'+product[1]+'</p><p><strong>{{trans("file.Code")}}: </strong>'+product[2]+ '</p><p><strong>{{trans("file.Brand")}}: </strong>'+product[3]+'</p><p><strong>{{trans("file.category")}}: </strong>'+product[4]+'</p><p><strong>{{trans("file.Quantity")}}: </strong>'+product[17]+'</p><p><strong>{{trans("file.Unit")}}: </strong>'+product[5]+'</p><p><strong>{{trans("file.Cost")}}: </strong>'+product[6]+'</p><p><strong>{{trans("file.Price")}}: </strong>'+product[7]+'</p><p><strong>{{trans("file.Tax")}}: </strong>'+product[8]+'</p><p><strong>{{trans("file.Tax Method")}} : </strong>'+product[9]+'</p><p><strong>{{trans("file.Alert Quantity")}} : </strong>'+product[10]+'</p><p><strong>{{trans("file.Product Details")}}: </strong></p>'+product[11];

        if(product[18]) {
            var product_image = product[18].split(",");
            if(product_image.length > 1) {
                slidertext = '<div id="product-img-slider" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
                for (var i = 0; i < product_image.length; i++) {
                    if(!i)
                        slidertext += '<div class="carousel-item active"><img src="public/images/product/'+product_image[i]+'" height="300" width="100%"></div>';
                    else
                        slidertext += '<div class="carousel-item"><img src="public/images/product/'+product_image[i]+'" height="300" width="100%"></div>';
                }
                slidertext += '</div><a class="carousel-control-prev" href="#product-img-slider" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#product-img-slider" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>';
            }
            else {
                slidertext = '<img src="public/images/product/'+product[18]+'" height="300" width="100%">';
            }
        }

        $("#combo-header").text('');
        $("table.item-list thead").remove();
        $("table.item-list tbody").remove();
        $("table.product-warehouse-list thead").remove();
        $("table.product-warehouse-list tbody").remove();
        $(".product-variant-list thead").remove();
        $(".product-variant-list tbody").remove();
        $(".product-variant-warehouse-list thead").remove();
        $(".product-variant-warehouse-list tbody").remove();
        $("#product-warehouse-section").addClass('d-none');
        $("#product-variant-section").addClass('d-none');
        $("#product-variant-warehouse-section").addClass('d-none');
        if(product[0] == 'combo') {
            $("#combo-header").text('{{trans("file.Combo Products")}}');
            product_list = product[13].split(",");
            variant_list = product[14].split(",");
            qty_list = product[15].split(",");
            price_list = product[16].split(",");
            $(".item-list thead").remove();
            $(".item-list tbody").remove();
            var newHead = $("<thead>");
            var newBody = $("<tbody>");
            var newRow = $("<tr>");
            newRow.append('<th>{{trans("file.product")}}</th><th>{{trans("file.Quantity")}}</th><th>{{trans("file.Price")}}</th>');
            newHead.append(newRow);

            $(product_list).each(function(i) {
                if(!variant_list[i])
                    variant_list[i] = 0;
                $.get('products/getdata/' + product_list[i] + '/' + variant_list[i], function(data) {
                    var newRow = $("<tr>");
                    var cols = '';
                    cols += '<td>' + data['name'] +' [' + data['code'] + ']</td>';
                    cols += '<td>' + qty_list[i] + '</td>';
                    cols += '<td>' + price_list[i] + '</td>';

                    newRow.append(cols);
                    newBody.append(newRow);
                });
            });

            $("table.item-list").append(newHead);
            $("table.item-list").append(newBody);
        }
        else if(product[0] == 'standard') {
            if(product[19]) {
                $.get('products/variant-data/' + product[12], function(variantData) {
                    var newHead = $("<thead>");
                    var newBody = $("<tbody>");
                    var newRow = $("<tr>");
                    newRow.append('<th>{{trans("file.Variant")}}</th><th>{{trans("file.Item Code")}}</th><th>{{trans("file.Additional Cost")}}</th><th>{{trans("file.Additional Price")}}</th><th>{{trans("file.Qty")}}</th>');
                    newHead.append(newRow);
                    $.each(variantData, function(i) {
                        var newRow = $("<tr>");
                        var cols = '';
                        cols += '<td>' + variantData[i]['name'] + '</td>';
                        cols += '<td>' + variantData[i]['item_code'] + '</td>';
                        if(variantData[i]['additional_cost'])
                            cols += '<td>' + variantData[i]['additional_cost'] + '</td>';
                        else
                            cols += '<td>0</td>';
                        if(variantData[i]['additional_price'])
                            cols += '<td>' + variantData[i]['additional_price'] + '</td>';
                        else
                            cols += '<td>0</td>';
                        cols += '<td>' + variantData[i]['qty'] + '</td>';

                        newRow.append(cols);
                        newBody.append(newRow);
                    });
                    $("table.product-variant-list").append(newHead);
                    $("table.product-variant-list").append(newBody);
                });
                $("#product-variant-section").removeClass('d-none');
            }
            if(role_id <= 2) {
                $.get('products/product_warehouse/' + product[12], function(data) {
                    if(data.product_warehouse[0].length != 0) {
                        warehouse = data.product_warehouse[0];
                        qty = data.product_warehouse[1];
                        batch = data.product_warehouse[2];
                        expired_date = data.product_warehouse[3];
                        imei_numbers = data.product_warehouse[4];
                        var newHead = $("<thead>");
                        var newBody = $("<tbody>");
                        var newRow = $("<tr>");
                        newRow.append('<th>{{trans("file.Warehouse")}}</th><th>{{trans("file.Batch No")}}</th><th>{{trans("file.Expired Date")}}</th><th>{{trans("file.Quantity")}}</th><th>{{trans("file.IMEI or Serial Numbers")}}</th>');
                        newHead.append(newRow);
                        $.each(warehouse, function(index) {
                            var newRow = $("<tr>");
                            var cols = '';
                            cols += '<td>' + warehouse[index] + '</td>';
                            cols += '<td>' + batch[index] + '</td>';
                            cols += '<td>' + expired_date[index] + '</td>';
                            cols += '<td>' + qty[index] + '</td>';
                            cols += '<td>' + imei_numbers[index] + '</td>';

                            newRow.append(cols);
                            newBody.append(newRow);
                            $("table.product-warehouse-list").append(newHead);
                            $("table.product-warehouse-list").append(newBody);
                        });
                        $("#product-warehouse-section").removeClass('d-none');
                    }
                    if(data.product_variant_warehouse[0].length != 0) {
                        warehouse = data.product_variant_warehouse[0];
                        variant = data.product_variant_warehouse[1];
                        qty = data.product_variant_warehouse[2];
                        var newHead = $("<thead>");
                        var newBody = $("<tbody>");
                        var newRow = $("<tr>");
                        newRow.append('<th>{{trans("file.Warehouse")}}</th><th>{{trans("file.Variant")}}</th><th>{{trans("file.Quantity")}}</th>');
                        newHead.append(newRow);
                        $.each(warehouse, function(index){
                            var newRow = $("<tr>");
                            var cols = '';
                            cols += '<td>' + warehouse[index] + '</td>';
                            cols += '<td>' + variant[index] + '</td>';
                            cols += '<td>' + qty[index] + '</td>';

                            newRow.append(cols);
                            newBody.append(newRow);
                            $("table.product-variant-warehouse-list").append(newHead);
                            $("table.product-variant-warehouse-list").append(newBody);
                        });
                        $("#product-variant-warehouse-section").removeClass('d-none');
                    }
                });
            }
        }

        $('#product-content').html(htmltext);
        $('#slider-content').html(slidertext);
        $('#product-details').modal('show');
        $('#product-img-slider').carousel(0);
    }

    $(document).ready(function() {
        $('#ajax-datatables').DataTable({
            responsive: true,
            fixedHeader: {
                header: true,
                footer: true
            },
            "processing": true,
            "serverSide": true,
            "ajax":{
                url:"products/product-data",
                data:{
                    all_permission: all_permission
                },
                dataType: "json",
                type:"post"
            },
            "createdRow": function( row, data, dataIndex ) {
                $(row).addClass('product-link');
                $(row).attr('data-product', data['product']);
                $(row).attr('data-imagedata', data['imagedata']);
            },
            "columns": [
                {"data": "key"},
                {"data": "image"},
                {"data": "name"},
                {"data": "code"},
                {"data": "brand"},
                {"data": "category"},
                {"data": "qty"},
                {"data": "unit"},
                {"data": "price"},
                {"data": "cost"},
                {"data": "stock_worth"},
                {"data": "options"},
            ],
            'language': {
                'lengthMenu': '_MENU_ {{trans("file.records per page")}}',
                "info":      '<small>{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)</small>',
                "search":  '{{trans("file.Search")}}',
                'paginate': {
                    'previous': '<i class="dripicons-chevron-left"></i>',
                    'next': '<i class="dripicons-chevron-right"></i>'
                }
            },
            order:[['2', 'asc']],
            'columnDefs': [
                {
                    "orderable": false,
                    'targets': [0, 1, 9, 10, 11]
                },
                {
                    'render': function(data, type, row, meta){
                        if(type === 'display'){
                            data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                        }

                        return data;
                    },
                    'checkboxes': {
                        'selectRow': true,
                        'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                    },
                    'targets': [0]
                }
            ],
            'select': { style: 'multi',  selector: 'td:first-child'},
            'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print', 'pdf'
            ]

        })

    } );

    if(all_permission.indexOf("products-delete") == -1)
        $('.buttons-delete').addClass('d-none');

    $('select').selectpicker();

</script>
@endpush
