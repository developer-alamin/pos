@extends('backend.layout.master')
@section('title') Brand @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Brand @endslot
@slot('title')Brand List @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-0">Brand Table</h5>
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bx bx-plus"></i>&nbsp; Add New</a>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#importCategory"><i class="dripicons-copy"></i>
                            Import Brand</button>
                    </div> 
                </div>
                
            </div>
            <div class="card-body">
                <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th class="not-exported"></th>
                            <th>Image</th>
                            <th>Brand</th>                            
                            <th class="not-exported">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lims_brand_all as $key=>$brand)
                        <tr data-id="{{$brand->id}}">
                            <td>{{++$key}}</td>
                            @if($brand->image)
                            <td> <img src="{{url('public/images/brand',$brand->image)}}" height="80" width="80">
                            </td>
                            @else
                            <td>No Image</td>
                            @endif
                            <td>{{ $brand->title }}</td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" user="menu">
                                        <li><button type="button" data-id="{{$brand->id}}" class="open-EditbrandDialog btn btn-link" data-bs-toggle="modal" data-bs-target="#editModal"><i class="dripicons-document-edit"></i> {{trans('file.edit')}}</button></li>
                                        <li class="divider"></li>
                                        {{ Form::open(['route' => ['brand.destroy', $brand->id], 'method' => 'DELETE'] ) }}
                                        <li>
                                            <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure want to delete?')"><i class="dripicons-trash"></i> {{trans('file.delete')}}</button>
                                        </li>
                                        {{ Form::close() }}
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="not-exported"></th>
                            <th>Image</th>
                            <th>Brand</th>                            
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
            {!! Form::open(['route' => 'brand.store', 'method' => 'post', 'files' => true]) !!}
        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Add Brand')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
            <div class="form-group">
                <label>{{trans('file.Title')}} *</label>
                {{Form::text('title',null,array('required' => 'required', 'class' => 'form-control', 'placeholder' => 'Type brand title...'))}}
            </div>
            <div class="form-group">
                <label>{{trans('file.Image')}}</label>
                {{Form::file('image', array('class' => 'form-control'))}}
            </div>
            <div class="form-group">
              <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary mt-2">
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
            {{ Form::open(['route' => ['brand.update', 1], 'method' => 'PUT', 'files' => true] ) }}
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title"> {{trans('file.Update Brand')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
          <div class="form-group">
            <label>{{trans('file.Title')}} *</label>
            {{Form::text('title',null, array('required' => 'required', 'class' => 'form-control'))}}
        </div>
        <input type="hidden" name="brand_id">
        <div class="form-group">
            <label>{{trans('file.Image')}}</label>
            {{Form::file('image', array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary mt-2">
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
            {!! Form::open(['route' => 'brand.import', 'method' => 'post', 'files' => true]) !!}
        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Import Brand')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
            <p>{{trans('file.The correct column order is')}} (title*, image [file name]) {{trans('file.and you must follow this')}}.</p>
            <p>{{trans('file.To display Image it must be stored in')}} public/images/brand {{trans('file.directory')}}</p>
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
                        <a href="public/sample_file/sample_brand.csv" class="btn btn-info btn-block btn-md"><i class="dripicons-download"></i>  {{trans('file.Download')}}</a>
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

    $(document).ready(function() {
        $(document).on('click', '.open-EditbrandDialog', function() {
            var url = "brand/"
            var id = $(this).data('id').toString();
            url = url.concat(id).concat("/edit");

            $.get(url, function(data) {
                $("input[name='title']").val(data['title']);
                $("input[name='brand_id']").val(data['id']);

            }); 
        });
    });
    
    

    
    
</script>

<script src="{{ URL::asset('assets/build/js/app.js') }}"></script>

@endsection
