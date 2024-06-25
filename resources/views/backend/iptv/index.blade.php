@extends('backend.layout.master')
@section('title') App @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') App @endslot
@slot('title')App List @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-0">App Table</h5>
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bx bx-plus"></i>&nbsp; Add New</a>
                    </div> 
                </div>
                
            </div>
            <div class="card-body">
                <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th class="not-exported"></th>
                            <th>Icon</th>
                            <th>App Name</th>
                            <th>User Name</th>
                            <th>Is Home</th>
                            <th>Apk File</th>
                            <th class="not-exported">Action</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr>
                            <th class="not-exported"></th>
                            <th>Icon</th>
                            <th>App Name</th>
                            <th>User Name</th>
                            <th>Is Home</th>
                            <th>Apk File</th>
                            <th class="not-exported">Action</th>
                        </tr>
                    </tfoot> --}}
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
            {!! Form::open(['route' => 'app.store', 'method' => 'post', 'files' => true]) !!}
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">{{trans('Add App')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('The field labels marked with * are required input
                        fields')}}.</small></p>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>{{trans('name')}} *</label>
                        {{Form::text('app_name',null,array('required' => 'required', 'class' => 'form-control',
                        'placeholder' => 'Type app name...'))}}
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{trans('Icon')}}</label>
                        <input type="file" name="icon" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="exampleSelect">Select User</label>
                        <select name="user_id" class="form-select" id="exampleSelect">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{trans('Apk File')}}</label>
                        <input type="file" name="apk_file" class="form-control">
                    </div>

                    <div class="col-md-6 form-group mt-2">
                        <div class="custom-control custom-switch">
                            <input name="is_home" type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Is Home?</label>
                        </div>
                        
                    </div>
                </div>

                <div class="form-group mt-2">
                    <input type="submit" value="{{trans('submit')}}" class="btn btn-primary">
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
            {{ Form::open(['route' => ['app.update', 1], 'method' => 'PUT', 'files' => true] ) }}
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">{{trans('Update App')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('The field labels marked with * are required input
                        fields')}}.</small></p>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>{{trans('name')}} *</label>
                        {{Form::text('app_name',null, array('required' => 'required', 'class' => 'form-control'))}}
                    </div>
                    <input type="hidden" name="app_id">
                    <div class="col-md-6 form-group">
                        <label>{{trans('Image')}}</label>
                        <input type="file" name="icon" class="form-control">
                    </div>
                  
                </div>

                <div class="form-group mt-2">
                    <input type="submit" value="{{trans('submit')}}" class="btn btn-primary">
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
<!-- Import Modal -->
{{-- <div id="importApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'app.import', 'method' => 'post', 'files' => true]) !!}
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">{{trans('Import App')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('The field labels marked with * are required input
                        fields')}}.</small></p>
                <p>{{trans('The correct column order is')}} (name*, parent_app) {{trans('and you must
                    follow this')}}.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{trans('Upload CSV File')}} *</label>
                            {{Form::file('file', array('class' => 'form-control','required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> {{trans('Sample File')}}</label>
                            <a href="public/sample_file/sample_app.csv" class="btn btn-info btn-block btn-md"><i
                                    class="dripicons-download"></i> {{trans('Download')}}</a>
                        </div>
                    </div>
                </div>
                <input type="submit" value="{{trans('submit')}}" class="btn btn-primary mt-2">
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div> --}}

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

    $(document).ready(function() {
        $(document).on('click', '.open-EditIpTvAppDialog', function() {
            var url = "app/"
            var id = $(this).data('id').toString();
        
            url = url.concat(id).concat("/edit");

            $.get(url, function(data) {
                $("input[name='app_name']").val(data['app_name']);
                $("input[name='app_id']").val(data['id']);

            }); 
        });
    });
    
    $('#ajax-datatables').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            url:"app/app-data",
            dataType: "json",
            type:"post"
        },
        "createdRow": function( row, data, dataIndex ) {
            $(row).attr('data-id', data['id']);
        },
        "columns": [
            {"data": "key"},
            {"data": "icon"},
            {"data": "app_name"},
            {"data": "user_name"},
            {"data": "is_home"},
            {"data": "apk_file"},
            {"data": "options"},
        ],
     
        // order:[['2', 'asc']],
        // 'columnDefs': [
        //     {
        //         "orderable": false,
        //         'targets': [0, 1, 3, 4, 5]
        //     },
        //     {
        //         'render': function(data, type, row, meta){
        //             if(type === 'display'){
        //                 data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
        //             }
                

        //            return data;
        //         },
        //         'checkboxes': {
        //            'selectRow': true,
        //            'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
        //         },
        //         'targets': [0]
        //     }
        // ],
        // 'select': { style: 'multi',  selector: 'td:first-child'},
        // 'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        // dom: 'Bfrtip',
            
    })

    
    
</script>

<script src="{{ URL::asset('assets/build/js/app.js') }}"></script>

@endsection
