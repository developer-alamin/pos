@extends('backend.layout.main') @section('content')

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>{{trans('Edit Plan')}}</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['plans.update', $plan->id], 'method' => 'put', 'files' => true]) !!}
                        <div class="">
                            <p class="italic"><small>{{trans('The field labels marked with * are required input
                                    fields')}}.</small></p>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>{{trans('Name')}} *</label>
                                    {{Form::text('name',$plan->name,array('required' => 'required', 'class' => 'form-control',
                                     'placeholder' => 'Plan name'))}}
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{trans('Price')}} *</label>
                                    {{Form::text('price',$plan->price,array('required' => 'required', 'class' => 'form-control',
                                    'placeholder' => 'Price'))}}
                                </div>
            
                                <div class="col-md-6 form-group mt-2">
                                    <label>{{trans('Currency')}} *</label>
                                    <select name="currency" id="currency" class="form-control" required>
                                            <option value="USD" {{$plan->currency == 'usd'?'selected':''}}>United States (USD)</option>
                                            <option value="CAD" {{$plan->currency == 'cad'?'selected':''}}>Canada (CAD)</option>
                                        </select>
                                </div>
                                
                                <div class="col-md-6 form-group mt-2">
                                    <label for="exampleSelect">Subscription *</label>
                                    <select name="subscription" class="form-control">
                                        <option value="week" {{$plan->subscription == 'week'?'selected':''}}>Weekly</option>
                                        <option value="month" {{$plan->subscription == 'month' && $plan->interval_count == 1 ?'selected':''}}>Monthly</option>
                                        <option value="quaterly" {{$plan->subscription == 'month' && $plan->interval_count == 3 ?'selected':''}} >Quaterly</option>
                                        <option value="half_yearly" {{$plan->subscription == 'month' && $plan->interval_count == 6 ?'selected':''}}>Half Yearly</option>
                                        <option value="9_months" {{$plan->subscription == 'month' && $plan->interval_count == 9 ?'selected':''}}>9 Months</option>
                                        <option value="year" {{$plan->subscription == 'year'?'selected':''}}>Yearly</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input class="mt-2" type="checkbox" name="status" {{$plan->status == 1?'checked':''}}>
                                        <label class="mt-2">{{trans('Active')}}</label>
                                </div>
                            </div>
            
                            <div class="form-group mt-2">
                                <input type="submit" value="{{trans('Update')}}" class="btn btn-primary">
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('scripts')
<script type="text/javascript">

    $("ul#people").siblings('a').attr('aria-expanded','true');
    $("ul#people").addClass("show");
    $("ul#people #user-create-menu").addClass("active");

    $('#warehouseId').hide();
    $('#biller-id').hide();
    $('.customer-section').hide();

    $('.selectpicker').selectpicker({
      style: 'btn-link',
    });

    $('#genbutton').on("click", function(){
      $.get('genpass', function(data){
        $("input[name='password']").val(data);
      });
    });

    $('select[name="role_id"]').on('change', function() {
        if($(this).val() == 5) {
            $('#biller-id').hide(300);
            $('#warehouseId').hide(300);
            $('.customer-section').show(300);
            $('.customer-input').prop('required',true);
            $('select[name="warehouse_id"]').prop('required',false);
            $('select[name="biller_id"]').prop('required',false);
        }
        else if($(this).val() > 2 && $(this).val() != 5) {
            $('select[name="warehouse_id"]').prop('required',true);
            $('select[name="biller_id"]').prop('required',true);
            $('#biller-id').show(300);
            $('#warehouseId').show(300);
            $('.customer-section').hide(300);
            $('.customer-input').prop('required',false);
        }
        else {
            $('select[name="warehouse_id"]').prop('required',false);
            $('select[name="biller_id"]').prop('required',false);
            $('#biller-id').hide(300);
            $('#warehouseId').hide(300);
            $('.customer-section').hide(300);
            $('.customer-input').prop('required',false);
        }
    });
</script>
@endpush
