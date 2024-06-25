@extends('backend.layout.main')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-0">Create Subscription</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('plans.checkout') }}" method="GET">
                @csrf

                <!-- Customer Information Section -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Customer</h5>
                        <!-- Customer Select Dropdown -->
                        <select class="form-select" name="customer">
                            @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <h5>Plan Name</h5>
                        <!-- Plan Select Dropdown -->
                        <select class="form-select" name="plan">
                            @foreach($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Terms & Conditions Section -->
                <div class="row mb-4">
                    {{-- <div class="col-md-6">
                        <h5>Set Schedule</h5>
                        <input type="date" id="schedule" name="schedule" class="form-control">
                    </div> --}}
                    <div class="col-md-6">
                        <h5>Payment Method</h5>
                        <select class="form-select" name="paymentMethod" id="paymentMethod">
                            <option value="card">Card</option>
                        </select>
                    </div>

                    <!-- Payment Method options -->


                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Create Subscription</button>
            </form>
        </div>
    </div>
</div>
@endsection