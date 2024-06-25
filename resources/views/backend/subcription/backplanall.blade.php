@extends('backend.layout.master')
@section('title') Plan @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Plan @endslot
@slot('title')Plan list @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-0">Plans all  Show</h5>
                    <div>
                        <a href="{{route('plans.all')}}" class="btn btn-success">Temporary Button to active plane from user end</a>
                    </div>
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bx bx-plus"></i>&nbsp; Add New</a>
                    </div> 
                    
                </div>
                
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{!! session()->get('message') !!}</div>
            @endif
            <div class="card-body">
                <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th class="not-exported">Plan Name</th>
                            <th>Billing_method</th>
                            <th>interval_count</th>
                            <th>Price</th>
                            <th>Currancy</th>
                           
                            <th class="not-exported">Action</th>
                        </tr>
                       
                    </thead>
                    <tbody>
                        @foreach ($all as $subscription)
                            <tr>
                                
                                <td>{{ $subscription->name  }}</td>
                                <td>{{ $subscription->billing_method  }}</td>
                                <td>{{ $subscription->interval_count  }}</td>
                                <td>{{ $subscription->price  }}</td>
                                <td>{{ $subscription->currency }}</td>
                               
                                <td>
                                    <a  class="btn btn-sucess" href="{{route('plans.edit',$subscription->id)}}">edit</a>
                                    <form action="{{ route('plans.delete',$subscription->id) }}" method="Post">
                                       @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="not-exported">Plan Name</th>
                            <th>Billing_method</th>
                            <th>interval_count</th>
                            <th>Price</th>
                            <th>Currancy</th>
                            
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
            {!! Form::open(['route' => 'plans.store', 'method' => 'post', 'files' => true]) !!}
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">{{trans('Add Plan')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('The field labels marked with * are required input
                        fields')}}.</small></p>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>{{trans('Name')}} *</label>
                        {{Form::text('name',null,array('required' => 'required', 'class' => 'form-control',
                        'placeholder' => 'Plan name'))}}
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{trans('Price')}} *</label>
                        {{Form::text('price',null,array('required' => 'required', 'class' => 'form-control',
                        'placeholder' => 'Price'))}}
                    </div>

                    <div class="col-md-6 form-group mt-2">
                        <label>{{trans('Currency')}} *</label>
                        <select name="currency" id="currency" class="form-control" required>
                                <option value="USD">United States (USD)</option>
                                <option value="CAD">Canada (CAD)</option>
                            </select>
                    </div>
                    
                    <div class="col-md-6 form-group mt-2">
                        <label for="exampleSelect">Subscription *</label>
                        <select name="subscription" class="form-control">
                            <option disabled selected>Choose billing method</option>
                            <option value="week">Weekly</option>
                            <option value="month">Monthly</option>
                            <option value="quaterly">Quaterly</option>
                            <option value="half_yearly">Half Yearly</option>
                            <option value="9_months">9 Months</option>
                            <option value="year">Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group mt-2">
                        <div class=" form-check form-switch">
                            <label class="form-check-label" for="customSwitch">Active?</label>
                            <input class="form-check-input" type="checkbox" name="status" id="customSwitch">
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
{{-- <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(['route' => ['plans.update', 1], 'method' => 'PUT', 'files' => true] ) }}
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
                        <input type="text" name="name" value="{{$plan->name}}">
                        </div>

                    <input type="hidden" name="plan_id">

                    <div class="col-md-6 form-group">
                        <label>{{trans('amount')}} *</label>
                        {{Form::text('amount',null,array('required' => 'required', 'class' => 'form-control'))}}
                    </div>

                    <div class="col-md-6 form-group">
                        <label>{{trans('currency')}} *</label>
                        {{Form::text('currency',null,array('required' => 'required', 'class' => 'form-control'))}}
                    </div>
                    <div class="col-md-6 form-group">
                        <label>{{trans('interval_count')}} *</label>
                        {{Form::number('interval_count',null,array('required' => 'required', 'class' => 'form-control'))}}
                    </div>
                    
                    <div class="col-md-6 form-group">
                        <label for="exampleSelect">Billing Period</label>
                        <select name="billing_period" class="form-control">
                            <option disabled selected>Choose billing method</option>
                            <option value="week">Weekly</option>
                            <option value="month">Monthly</option>
                            <option value="year">Yearly</option>
                        </select>
                    </div>
                  
                </div>

                <div class="form-group mt-2">
                    <input type="submit" value="{{trans('submit')}}" class="btn btn-primary">
                </div>
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

{{-- plans --}}

<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 $(document).ready(function() {
        $(document).on('click', '.open-EditIpTvAppDialog', function() {
            var url = "plans"
            var id = $(this).data('id').toString();
        
            url = url.concat(id).concat("/edit");

            $.get(url, function(data) {
                $("input[name='name']").val(data['name']);
                $("input[name='amount']").val(data['amount']);
                $("input[name='currency']").val(data['currency']);
                $("input[name='interval_count']").val(data['interval_count']);
                $("input[name='billing_period']").val(data['billing_period']);
                $("input[name='plan_id']").val(data['id']);

            }); 
        });
    });
</script>

<script src="{{ URL::asset('assets/build/js/app.js') }}"></script>

@endsection

















{{-- 

@extends('backend.layout.main')
@section('content')
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif


@section('content')
<style>
            /* The switch - the box around the slider */
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* The slider */
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2196F3;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('alert-success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert-success') }}
                        </div>
                    @endif

                  
                    <h4><b>All Plan Show</b></h4>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Plan Name</th>
                            <th scope="col">Billing_method</th>
                            <th scope="col">interval_count</th>
                            <th scope="col">Price</th>
                            <th scope="col">Currancy</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $subscription)
                                <tr>
                                    
                                    <td>{{ $subscription->name  }}</td>
                                    <td>{{ $subscription->billing_method  }}</td>
                                    <td>{{ $subscription->interval_count  }}</td>
                                    <td>{{ $subscription->price/100  }}</td>
                                    <td>{{ $subscription->currency }}</td>
                                    <td>
                                        <a class="btn btn-success" href="">edit</a>
                                        <a class="btn btn-danger" href="">delete</a>
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
       
        
        $('#switcher').click(function() {
            var subscriptionName = $('#switcher').val();
            if($(this).is(':checked')){

                $.ajax({
                    url:'{{ route("subscriptions.resume") }}',
                    data: { subscriptionName },
                    type:"GET",
                    success:function( response )
                    {

                    },
                    error: function(response)
                    {
                    }
                });
            }
            else {
                $.ajax({
                    url:'{{ route("subscriptions.cancel") }}',
                    data: { subscriptionName },
                    type:"GET",
                    success:function( response )
                    {
                        console.log(response)
                    },
                    error: function(response)
                    {
                    }
                });
            }
        });
    });
</script>

@endpush --}}
