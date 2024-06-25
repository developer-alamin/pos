@extends('backend.layout.main') @section('content')
@if(session()->has('message'))
        <div class="alert alert-success alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{!! session()->get('message') !!}</div>
@endif
@if(session()->has('message2'))
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message2') }}</div>
@endif
@if(session()->has('message3'))
        <div class="alert alert-danger alert-dismissible text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message3') }}</div>
@endif
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif

<section>
        {{-- <div class="container-fluid">
            <a href="{{route('plans.all')}}" class="btn btn-info"><i class="dripicons-plus"></i> {{trans('Subscribe to a Plan')}}</a>
        </div> --}}
        <div class="d-flex justify-content-between align-items-center p-2">
            <h3 class="mb-0">View Subscriptions</h3>
            <a href="{{ route('subscriptions.create') }}" class="btn btn-primary">Create New Subscription</a>
        </div>        
    <div class="table-responsive">
        <table id="user-table" class="table">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>{{trans('Plan Name')}}</th>
                    <th>{{trans('Customer Name')}}</th>
                    <th>Created Date</th>
                    <th>Due Date</th>
                    <th>{{trans('Subscription Name')}}</th>
                    <th>{{trans('file.Amount')}}</th>
                    <th>{{trans('file.Status')}}</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $key=>$subscription)
                <tr data-id="{{$subscription->id}}">
                    <td>{{$key}}</td>
                    <td>{{ $subscription->plan->name }}</td>
                    <td>{{ $subscription->customer->name }}</td>
                    <td>{{$subscription->created_at->format('Y-m-d h:i:s A')}}</td>
                    <td>{{$subscription->trial_ends_at->format('Y-m-d h:i:s A')}}</td>
                    <td>{{ $subscription->name }}</td>
                    <td>${{ $subscription->plan->price }}</td>
                    <td>{{ $subscription->stripe_status }}</td>
                    <td>
                        
                        <div class="btn-group">
                            <form action="{{route('subscription.active')}}">
                                @csrf
                                <input type="hidden" name="stripe_id" value="{{$subscription->stripe_id }}">
                                <button type="submit" class="btn btn-xs {{$subscription->stripe_status == 'active' || $subscription->stripe_status =='trialing'?'btn-info':'btn-warning'}} waves-effect waves-light" onclick="return confirm('{{$subscription->stripe_status == 'active' ||$subscription->stripe_status =='trialing' ? 'Are you sure to Cancel  the Subscription?':'Cancelled can not be undone!'}}')">{{ $subscription->stripe_status == 'active' || $subscription->stripe_status =='trialing' ? 'Cancel':'Cancelled'}}</button> 
                              </form>
                              &nbsp;
                              <form action="{{route('sub.delete')}}" method="POST">
                                @csrf
                                <input type="hidden" name="subId" value="{{$subscription->id }}">
                                <button type="submit" class="btn btn-xs  btn-danger waves-effect waves-light" onclick="return confirm('Are you sure to Cancel  the Subscription?')">Delete</button> 
                              </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>


@endsection

@push('scripts')
<script type="text/javascript">

    $("ul#sidebarApps34").siblings('a').attr('aria-expanded','true');
    $("ul#sidebarApps34").addClass("show");
    $("ul#sidebarApps34 #sidebarApps34").addClass("active");

    var user_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	function confirmDelete() {
	    if (confirm("Are you sure want to change status?")) {
	        return true;
	    }
	    return false;
	}

    $('#user-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ {{trans("file.records per page")}}',
             "info":      '<small>{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)</small>',
            "search":  '{{trans("file.Search")}}',
            'paginate': {
                    'previous': '<i class="dripicons-chevron-left"></i>',
                    'next': '<i class="dripicons-chevron-right"></i>'
            }
        },
        'columnDefs': [
            {
                "orderable": false,
                'targets': [0, 4]
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
        dom: '<"row"lfB>rtip',
        buttons: [
            {
                extend: 'pdf',
                text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'excel',
                text: '<i title="export to excel" class="dripicons-document-new"></i>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'csv',
                text: '<i title="export to csv" class="fa fa-file-text-o"></i>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'print',
                text: '<i title="print" class="fa fa-print"></i>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                text: '<i title="delete" class="dripicons-cross"></i>',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                    if(user_verified == '1') {
                        user_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                user_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(user_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:' /subscriptions/deletebyselection',
                                data:{
                                    userIdArray: user_id
                                },
                                success:function(data){
                                    alert(data);
                                }
                            });
                            dt.rows({ page: 'current', selected: true }).remove().draw(false);
                        }
                        else if(!user_id.length)
                            alert('No subscription is selected!');
                    }
                    else
                        alert('This feature is disable for demo!');
                }
            },
            {
                extend: 'colvis',
                text: '<i title="column visibility" class="fa fa-eye"></i>',
                columns: ':gt(0)'
            },
        ],
    } );

    if(all_permission.indexOf("users-delete") == -1)
        $('.buttons-delete').addClass('d-none');
</script>
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
@endpush
