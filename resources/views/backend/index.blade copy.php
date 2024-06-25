@extends('backend.layout.main')
@section('content')

@if(session()->has('not_permitted'))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
    aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
    aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif
@php
if($general_setting->theme == 'default.css'){
$color = '#733686';
$color_rgba = 'rgba(115, 54, 134, 0.8)';
}
elseif($general_setting->theme == 'green.css'){
$color = '#2ecc71';
$color_rgba = 'rgba(46, 204, 113, 0.8)';
}
elseif($general_setting->theme == 'blue.css'){
$color = '#3498db';
$color_rgba = 'rgba(52, 152, 219, 0.8)';
}
elseif($general_setting->theme == 'dark.css'){
$color = '#34495e';
$color_rgba = 'rgba(52, 73, 94, 0.8)';
}
@endphp
<div class="row">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="brand-text float-left mt-4">
        <h3>{{trans('file.welcome')}} <span>{{Auth::user()->name}} ({{ now()->format('d-m-Y') }})</span> </h3>
      </div>
      @if(in_array("revenue_profit_summary", $all_permission))
      <div class="filter-toggle btn-group">
        <button class="btn btn-secondary date-btn active" data-start_date="{{date('Y-m-d')}}"
          data-end_date="{{date('Y-m-d')}}">{{trans('file.Today')}}</button>
        <button class="btn btn-secondary date-btn" data-start_date="{{date('Y-m-d', strtotime(' -7 day'))}}"
          data-end_date="{{date('Y-m-d')}}">{{trans('file.Last 7 Days')}}</button>
        <button class="btn btn-secondary date-btn" data-start_date="{{date('Y').'-'.date('m').'-'.'01'}}"
          data-end_date="{{date('Y-m-d')}}">{{trans('file.This Month')}}</button>
        <button class="btn btn-secondary date-btn" data-start_date="{{date('Y').'-01'.'-01'}}"
          data-end_date="{{date('Y').'-12'.'-31'}}">{{trans('file.This Year')}}</button>
      </div>
      @endif
    </div>
  </div>
</div>
<!-- Counts Section -->
<section class="dashboard-counts">
  <div class="container-fluid">
    <div class="row">
      @if(in_array("revenue_profit_summary", $all_permission))
      <div class="col-md-12 form-group">
        <div class="row">
          <!-- Count item widget-->
          <div class="col-sm-3">
            <div class="wrapper count-title">
              <div class="icon"><i class="dripicons-graph-bar" style="color: #733686"></i></div>
              <div>
                <div class="count-number revenue-data">${{number_format((float)$revenue, 2, '.', '')}}</div>
                <div class="name"><strong style="color: #733686">Earnings</strong></div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-sm-3">
            <div class="wrapper count-title">
              <div class="icon"><i class="dripicons-trophy" style="color: #297ff9"></i></div>
              <div>
                <div class="count-number return-data">{{$product_sold}}</div>
                <div class="name"><strong style="color: #ff8952">Product Sold</strong></div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-sm-3">
            <div class="wrapper count-title">
              <div class="icon"><i class="dripicons-media-loop" style="color: #00c689"></i></div>
              <div>
                <div class="count-number purchase_return-data">{{$total_sales}}
                </div>
                <div class="name"><strong style="color: #00c689">Orders</strong></div>
              </div>
            </div>
          </div>
          <!-- Count item widget-->
          <div class="col-sm-3">
            <div class="wrapper count-title">
              <div class="icon"><i class="dripicons-return" style="color: #ff8952"></i></div>
              <div>
                <div class="count-number profit-data">${{number_format((float)$return, 2, '.', '')}}</div>
                <div class="name"><strong style="color: #297ff9">Sales Return</strong></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      {{-- <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4>{{trans('file.Recent Transaction')}}</h4>
            <div class="right-column">
              <div class="badge badge-primary">{{trans('file.latest')}} 5</div>
            </div>
          </div>
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#sale-latest" role="tab" data-toggle="tab">{{trans('file.Sale')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#purchase-latest" role="tab" data-toggle="tab">{{trans('file.Purchase')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#quotation-latest" role="tab" data-toggle="tab">{{trans('file.Quotation')}}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#payment-latest" role="tab" data-toggle="tab">{{trans('file.Payment')}}</a>
            </li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade show active" id="sale-latest">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>{{trans('file.date')}}</th>
                      <th>{{trans('file.reference')}}</th>
                      <th>{{trans('file.customer')}}</th>
                      <th>{{trans('file.status')}}</th>
                      <th>{{trans('file.grand total')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($recent_sale as $sale)
                    <tr>
                      <td>{{ date($general_setting->date_format, strtotime($sale->created_at->toDateString())) }}</td>
                      <td>{{$sale->reference_no}}</td>
                      <td>{{$sale->customer->name}}</td>
                      @if($sale->sale_status == 1)
                      <td>
                        <div class="badge badge-success">{{trans('file.Completed')}}</div>
                      </td>
                      @elseif($sale->sale_status == 2)
                      <td>
                        <div class="badge badge-danger">{{trans('file.Pending')}}</div>
                      </td>
                      @else
                      <td>
                        <div class="badge badge-warning">{{trans('file.Draft')}}</div>
                      </td>
                      @endif
                      <td>{{$sale->grand_total}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="purchase-latest">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>{{trans('file.date')}}</th>
                      <th>{{trans('file.reference')}}</th>
                      <th>{{trans('file.Supplier')}}</th>
                      <th>{{trans('file.status')}}</th>
                      <th>{{trans('file.grand total')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($recent_purchase as $purchase)
                    <tr>
                      <td>{{date($general_setting->date_format, strtotime($purchase->created_at->toDateString())) }}
                      </td>
                      <td>{{$purchase->reference_no}}</td>
                      @if($purchase->supplier)
                      <td>{{$purchase->supplier->name}}</td>
                      @else
                      <td>N/A</td>
                      @endif
                      @if($purchase->status == 1)
                      <td>
                        <div class="badge badge-success">Recieved</div>
                      </td>
                      @elseif($purchase->status == 2)
                      <td>
                        <div class="badge badge-success">Partial</div>
                      </td>
                      @elseif($purchase->status == 3)
                      <td>
                        <div class="badge badge-danger">Pending</div>
                      </td>
                      @else
                      <td>
                        <div class="badge badge-danger">Ordered</div>
                      </td>
                      @endif
                      <td>{{$purchase->grand_total}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="quotation-latest">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>{{trans('file.date')}}</th>
                      <th>{{trans('file.reference')}}</th>
                      <th>{{trans('file.customer')}}</th>
                      <th>{{trans('file.status')}}</th>
                      <th>{{trans('file.grand total')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($recent_quotation as $quotation)
                    <tr>
                      <td>{{date($general_setting->date_format, strtotime($quotation->created_at->toDateString())) }}
                      </td>
                      <td>{{$quotation->reference_no}}</td>
                      <td>{{$quotation->customer->name}}</td>
                      @if($quotation->quotation_status == 1)
                      <td>
                        <div class="badge badge-danger">Pending</div>
                      </td>
                      @else
                      <td>
                        <div class="badge badge-success">Sent</div>
                      </td>
                      @endif
                      <td>{{$quotation->grand_total}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="payment-latest">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>{{trans('file.date')}}</th>
                      <th>{{trans('file.reference')}}</th>
                      <th>{{trans('file.Amount')}}</th>
                      <th>{{trans('file.Paid By')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($recent_payment as $payment)
                    <tr>
                      <td>{{date($general_setting->date_format, strtotime($payment->created_at->toDateString())) }}</td>
                      <td>{{$payment->payment_reference}}</td>
                      <td>{{$payment->amount}}</td>
                      <td>{{$payment->paying_method}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

      {{-- Item Wise Sales --}}
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4>{{trans('Item Wise Sales')}}</h4>
          </div>


          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>QTY in Inventory</th>
                  <th>Cost in Inventory</th>
                  <th>QTY in purchased</th>
                  <th>Total Cost</th>
                  <th>QTY in Sales</th>
                  <th>Total Sales</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categorySales as $key => $c_sale)
                <tr>
                  <td>{{ $key }}</td>
                  <td>{{$c_sale['qty_inventory']}}</td>
                  <td>${{$c_sale['cost_inventory']}}</td>

                  <td>{{$c_sale['qty_purchase']}}</td>
                  <td>${{$c_sale['total_purchase']}}</td>
                  <td>{{$c_sale['qty_sales']}}</td>
                  <td>${{$c_sale['total_sales']}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>


        </div>
      </div>

    </div>
  </div>
</section>


@endsection

@push('scripts')
<script type="text/javascript">
  // Show and hide color-switcher
    $(".color-switcher .switcher-button").on('click', function() {
        $(".color-switcher").toggleClass("show-color-switcher", "hide-color-switcher", 300);
    });

    // Color Skins
    $('a.color').on('click', function() {
        /*var title = $(this).attr('title');
        $('#style-colors').attr('href', 'css/skin-' + title + '.css');
        return false;*/
        $.get('setting/general_setting/change-theme/' + $(this).data('color'), function(data) {
        });
        var style_link= $('#custom-style').attr('href').replace(/([^-]*)$/, $(this).data('color') );
        $('#custom-style').attr('href', style_link);
    });

    $(".date-btn").on("click", function() {
        $(".date-btn").removeClass("active");
        $(this).addClass("active");
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');
        $.get('dashboard-filter/' + start_date + '/' + end_date, function(data) {
            //console.log(data);
            dashboardFilter(data);
        });
    });

    function dashboardFilter(data){
        $('.revenue-data').hide();
        $('.revenue-data').html('$'+parseFloat(data[0]).toFixed(2));
        $('.revenue-data').show(500);

        $('.return-data').hide();
        $('.return-data').html(data[4]);
        $('.return-data').show(500);

        $('.profit-data').hide();
        $('.profit-data').html('$'+parseFloat(data[1]).toFixed(2));
        $('.profit-data').show(500);

        $('.purchase_return-data').hide();
        $('.purchase_return-data').html(data[5]);
        $('.purchase_return-data').show(500);
    }
</script>
@endpush