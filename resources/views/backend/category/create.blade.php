@extends('backend.layout.master')
@section('title') Category @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Category @endslot
@slot('title')Category List @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-0">Category Table</h5>
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bx bx-plus"></i>&nbsp; Add New</a>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importCategory"><i class="dripicons-copy"></i>
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
                            <th>Category</th>
                            <th>Parent Category</th>
                            <th>Num of Product</th>
                            <th>Stock Quantity</th>
                            <th>Stock Worth (Price/Cost)</th>
                            <th class="not-exported">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="not-exported"></th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Parent Category</th>
                            <th>Num of Product</th>
                            <th>Stock Quantity</th>
                            <th>Stock Worth (Price/Cost)</th>
                            <th class="not-exported">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'category.store', 'method' => 'post', 'files' => true]) !!}
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Add Category')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('file.The field labels marked with * are required input
                        fields')}}.</small></p>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>{{trans('file.name')}} *</label>
                        {{Form::text('name',null,array('required' => 'required', 'class' => 'form-control',
                        'placeholder' => 'Type category name...'))}}
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{trans('file.Image')}}</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{trans('file.Parent Category')}}</label>
                        {{Form::select('parent_id', $lims_categories, null, ['class' => 'form-control','placeholder' =>
                        'No Parent Category'])}}
                    </div>
                </div>

                <div class="form-group mt-2">
                    <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(['route' => ['category.update', 1], 'method' => 'PUT', 'files' => true] ) }}
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Update Category')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('file.The field labels marked with * are required input
                        fields')}}.</small></p>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>{{trans('file.name')}} *</label>
                        {{Form::text('name',null, array('required' => 'required', 'class' => 'form-control'))}}
                    </div>
                    <input type="hidden" name="category_id">
                    <div class="col-md-6 form-group">
                        <label>{{trans('file.Image')}}</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{trans('file.Parent Category')}}</label>
                        <select name="parent_id" class="form-control selectpicker" id="parent">
                            <option value="">No {{trans('file.parent')}}</option>
                            @foreach($lims_category_all as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mt-2">
                    <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
<!-- Import Modal -->
<div id="importCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'category.import', 'method' => 'post', 'files' => true]) !!}
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Import Category')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('file.The field labels marked with * are required input
                        fields')}}.</small></p>
                <p>{{trans('file.The correct column order is')}} (name*, parent_category) {{trans('file.and you must
                    follow this')}}.</p>
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
                            <a href="public/sample_file/sample_category.csv" class="btn btn-info btn-block btn-md"><i
                                    class="dripicons-download"></i> {{trans('file.Download')}}</a>
                        </div>
                    </div>
                </div>
                <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary mt-2">
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
@section('script')

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

{{-- <script src="{{ URL::asset('assets/build/js/pages/datatables.init.js') }}"></script> --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on("click", ".open-EditCategoryDialog", function(){
          var url ="category/";
          var id = $(this).data('id').toString();
          url = url.concat(id).concat("/edit");

          $.get(url, function(data){
            $("#editModal input[name='name']").val(data['name']);
            $("#editModal select[name='parent_id']").val(data['parent_id']);
            $("#editModal input[name='category_id']").val(data['id']);
            $('.selectpicker').selectpicker('refresh');
          });
    });
    
    $('#ajax-datatables').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            url:"category/category-data",
            dataType: "json",
            type:"post"
        },
        "createdRow": function( row, data, dataIndex ) {
            $(row).attr('data-id', data['id']);
        },
        "columns": [
            {"data": "key"},
            {"data": "image"},
            {"data": "name"},
            {"data": "parent_id"},
            {"data": "number_of_product"},
            {"data": "stock_qty"},
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
                'targets': [0, 1, 3, 4, 5, 6, 7]
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

    
    
</script>

<script src="{{ URL::asset('assets/build/js/app.js') }}"></script>

@endsection
