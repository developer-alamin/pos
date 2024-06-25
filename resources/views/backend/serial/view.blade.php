@extends('backend.layout.main') @section('content')

@section('content')

<section>
    <div class="container-fluid">
        <p class="alert alert-success alert-dismissible text-center" style="display: none;" id="msg"><button
                type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </p>
    </div>
    <form action="{{ route('serial.delete') }}" method="post">
        @csrf
        <div class="table-responsive">
            <input class="btn btn-success m-2" type="submit" name="submit" value="Delete Serial" />
            <table id="product-data-table" class="table" style="width: 100%">
                <thead>
                    <tr>
                        <th class="not-exported">
                            <div class="checkbox">
                                <input type="checkbox" class="dt-checkboxes" id="checkAll"><label
                                    for="checkAll"></label>
                                {{-- <input type="checkbox" class="dt-checkboxes"><label></label> --}}
                            </div>
                        </th>
                        <th>Serials Numbers</th>
                        <th>Variant Info</th>
                        <th>Warranty</th>
                        <th>Brand</th>
                        <th>Retail Price</th>
                        <th>Cost Price</th>
                        <th>Status</th>
                        <th class="not-exported">{{trans('file.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($serials as $key => $item)
                    <tr>
                        <td>
                            <div class="checkbox">
                                <input name='id[]' type="checkbox" id="checkItem_{{ $key }}" class="dt-checkboxes"
                                    value="{{ $item->id }}"><label for="checkItem_{{ $key }}"></label>
                                {{-- <input type="checkbox" class="dt-checkboxes"><label></label> --}}
                            </div>
                        </td>
                        <td>{{ $item->serials }}</td>
                        <td>
                            <strong>Color</strong> : {{ $item->color }},
                            <strong>Size</strong> : {{ $item->size }},
                            <strong>Network</strong> : {{ $item->network }},
                            <strong>Condition</strong> : {{ $item->condition }}
                        </td>
                        <td>{{ $item->warranty }}</td>
                        <td>{{ $item->brand->title }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->cost }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @php
                            $product_info = $item->product->code . ' (' . $item->product->name . ')';
                            @endphp
                            <form action="{{ route('product.printBarcode') }}" method="GET" class="printForm">
                                @csrf
                                <button type="button" data-id="{{ $item->id }}"
                                    class="open-EditCategoryDialog btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editModal"><i class="fa fa-edit" title="Edit Serials"
                                        aria-hidden="true"></i></button>
                                <input type="hidden" name="data" value="{{ $product_info }}" />
                                <input type="hidden" name="serial_key" value="{{ $item->serials }}" />
                                <button type="submit" class="btn btn-danger btn-sm printFormBtn"><i
                                        title="Print Barcode" class="fa fa-print"></i></button>
                            </form>
                            {{-- <a href="#" class="btn btn-danger btn-sm"></a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</section>

{{-- Edit Modal --}}
<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <form action="#" id="editFormSerial">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Update Serials</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <p class="italic"><small>{{trans('file.The field labels marked with * are required input
                            fields')}}.</small></p>
                    <input type="hidden" name="id" id="serial_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cost Price *</strong> </label>
                                <input type="number" id="cost_price" name="cost" value="" required class="form-control"
                                    step="any">
                                <span class="validation-msg"></span>
                            </div>
                            <div class="form-group">
                                <label>Retail Price *</strong> </label>
                                <input type="number" id="retail_price" name="price" value="" required
                                    class="form-control" step="any">
                                <span class="validation-msg"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('file.Brand')}}</strong> </label>
                                <div class="input-group">
                                    <input type="hidden" name="brand" value="">
                                    <select name="brand_id" id="brand_id" class="selectpicker form-control"
                                        data-live-search="true" data-live-search-style="begins" title="Select Brand...">
                                        @foreach($brand_list as $brand)
                                        <option value="{{$brand->id}}">{{$brand->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Additional Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color </label>
                                <div class="input-group">
                                    <select name="color" id="color" class="selectpicker form-control"
                                        data-live-search="true" data-live-search-style="begins" title="Select color...">
                                        <option value="black">Black</option>
                                        <option value="purple">Purple</option>
                                        <option value="red">Red</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Network </label>
                                <div class="input-group">
                                    <select name="network" id="network" class="selectpicker form-control"
                                        data-live-search="true" data-live-search-style="begins"
                                        title="Select network...">
                                        <option value="2g">2G</option>
                                        <option value="3g">3G</option>
                                        <option value="4g">4G</option>
                                        <option value="5g">5G</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Warranty *</strong> </label>
                                <input type="text" name="warranty" id="warranty" required class="form-control"
                                    step="any" placeholder="1 Years / 12 Months">
                                <span class="validation-msg"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Size </label>
                                <div class="input-group">
                                    <select name="size" id="size" class="selectpicker form-control"
                                        data-live-search="true" data-live-search-style="begins" title="Select Size...">
                                        <option value="264">264 GB</option>
                                        <option value="128">128 GB</option>
                                        <option value="64">64 GB</option>
                                        <option value="32">32 GB</option>
                                        <option value="16">16 GB</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Condition </label>
                                <div class="input-group">
                                    <select name="condition" id="condition" class="selectpicker form-control"
                                        data-live-search="true" data-live-search-style="begins"
                                        title="Select condition...">
                                        <option value="new">New</option>
                                        <option value="used">Used</option>
                                        <option value="other">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="submit" id="submit_btn" value="{{trans('file.submit')}}" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Print Button Click
    $(".printFormBtn").click(function(event) {
        event.preventDefault(); // Prevent the default form submission
    
        // You can perform any validation or manipulation here
    
        // Submit the inner form
        $(".printForm").submit();
    });

    //Checked All
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    // Edit Dialog
    $(document).on("click",".open-EditCategoryDialog", function () {
        var id = $(this).data('id').toString();
        $.ajax({
            type: "GET",
            url: "/serial/edit/"+id,
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#serial_id").val(response.id);
                $("#editModal select[name='brand_id']").val(response.brand_id);
                $("#editModal select[name='color']").val(response.color);
                $("#editModal select[name='condition']").val(response.condition);        
                $("#cost_price").val(response.cost);
                $("#editModal select[name='network']").val(response.network);                
                $("#retail_price").val(response.price);
                $("#editModal select[name='size']").val(response.size);
                $("#warranty").val(response.warranty);
                $('.selectpicker').selectpicker('refresh');
            }
        });
    });

    // Update Data
    $('#editFormSerial').submit(function(e) {
        e.preventDefault(); // Prevent normal form submission
        var id = $("#serial_id").val();
        var formData = $(this).serialize();
        $("#submit_btn").val("Loading..");
        $.ajax({
            type: 'POST',
            url: "/serial/update/"+id, // Update with your route
            data: formData,
            success: function(response) {
                console.log(response); 
                $("#editModal").modal("hide");
                $("#msg").html(response.message);
                $("#msg").show();
                $("#submit_btn").val("Submit");
                setTimeout(() => {
                    window.location.reload(1);
                }, 1000);
            }
        });
    });
</script>
@endpush