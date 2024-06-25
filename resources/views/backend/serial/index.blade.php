@extends('backend.layout.main')

@section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>
                            <i class="fa fa-info-circle"></i> &nbsp; <span class="text-info">Quantity is {{
                                $product->qty }}: Spliting into {{ $product->qty }} serials.</span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input
                                fields')}}.</small></p>
                        <form method="post" action="{{ route('serial.post', $product->id) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cost Price *</strong> </label>
                                        <input type="number" name="cost" value="{{$product->cost}}" required
                                            class="form-control" step="any">
                                        <span class="validation-msg"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Retail Price *</strong> </label>
                                        <input type="number" name="price" value="{{$product->price}}" required
                                            class="form-control" step="any">
                                        <span class="validation-msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('file.Brand')}}</strong> </label>
                                        <div class="input-group">
                                            <input type="hidden" name="brand" value="{{ $product->brand_id}}">
                                            <select name="brand_id" class="selectpicker form-control"
                                                data-live-search="true" data-live-search-style="begins"
                                                title="Select Brand...">
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
                                            <select name="color" class="selectpicker form-control"
                                                data-live-search="true" data-live-search-style="begins"
                                                title="Select color...">
                                                <option value="black">Black</option>
                                                <option value="purple">Purple</option>
                                                <option value="red">Red</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Network </label>
                                        <div class="input-group">
                                            <select name="network" class="selectpicker form-control"
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
                                        <input type="text" name="warranty" required class="form-control" step="any"
                                            placeholder="1 Years / 12 Months">
                                        <span class="validation-msg"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Size </label>
                                        <div class="input-group">
                                            <select name="size" class="selectpicker form-control"
                                                data-live-search="true" data-live-search-style="begins"
                                                title="Select Size...">
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
                                            <select name="condition" class="selectpicker form-control"
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
                            <h4>Generate Serials</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Method 1: Automatically Generate Serials</h5>
                                    <div class="form-group">
                                        <label>Enter Serial QTY</label>
                                        <input type="number" id="serialQty" class="form-control" step="any"
                                            value="{{ $product->qty }}">
                                        <span class="validation-msg"></span>
                                    </div>
                                    <button class="btn btn-info" id="generateBtnAutomatic">Generate Serials</button>
                                    <h5 class="mt-3">Method 2: Provide Range</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start </label>
                                                <input type="number" id="start" class="form-control" step="any"
                                                    placeholder="35">
                                                <span class="validation-msg"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End </label>
                                                <input type="number" id="end" class="form-control" step="any"
                                                    placeholder="75">
                                                <span class="validation-msg"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p>Format</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios"
                                                    id="exampleRadios1" value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Item Id - Supplier Code - Serial Id
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios"
                                                    id="exampleRadios2" value="option2">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Supplier Code - Item ID - Serial Id
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <button class="btn btn-info my-2" id="generate">Generate Serials</button>
                                </div>
                                <div class="col-md-6">
                                    <h5>Method 3: Input Serial / IMEI Manually.</h5>
                                    <div class="form-group">
                                        <textarea name="serials" id="generatedSerials" cols="20" rows="10"
                                            class="form-control" required></textarea>
                                        <span class="validation-msg"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Save" class="btn btn-primary" id="submit-btn">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // AUtomatic Generate
    $('#generateBtnAutomatic').click(function() {
        var quantity = parseInt($('#serialQty').val());
        // var serials = [];

        // for (var i = 0; i < quantity; i++) {
        //     var uniqueSerial = generateUniqueSerial();
        //     serials.push(uniqueSerial);
        // }

        // $('#generatedSerials').val(serials.join('\n'));
        $('#generatedSerials').val(quantity);

    });

    $('#generate').on('click', function() {
    var start = parseInt($('#start').val());
    var end = parseInt($('#end').val());

    if (isNaN(start) || isNaN(end)) {
      alert('Please enter valid start and end values.');
      return;
    }

    if (start >= end) {
      alert('Start value must be less than end value.');
      return;
    }

    var generatedNumbers = [];
    for (var i = start; i <= end; i++) {
      var uniqueNumber = generateUniqueSerial();
      generatedNumbers.push(uniqueNumber);
    }

    $('#generatedSerials').val(generatedNumbers.join('\n'));
  });

    function generateUniqueSerial() {
        var serial = '';
        var characters = '0123456789';
        var charactersLength = characters.length;

        for (var i = 0; i < 10; i++) {
            serial += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return serial;
    }

    

  

});
</script>
@endpush