@extends('backend.layout.master')
@section('title') Repairs Manage @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h4>Manage Repairs</h4>
		<div class="card">
			<div class="card-header">
				<div class="card_header_action">
					<button class="btn btn-outline-success fs-15 fillter_btn">Fillter <span class="bx bx-check"></span></button>
					<a href="{{route('repairs.create')}}" class="btn fs-15 btn-primary">Ticket Create</a>
				</div>
				<div class="filter_box " style="display: none;">
					<form>
						<div class="row">
							<div class="col-3">
								<label for="ticketId">Ticket Id</label>
								<input type="text" name="ticketId" class="form-control" placeholder="Ticket Id">
							</div>
							<div class="col-3">
								<label for="customer">Customer Name</label>
								<input type="text" name="customer" class="form-control" placeholder="Customer Name">
							</div>
							<div class="col-3">
								<label for="assigTo">Assigned To</label>
								<select name="assigTo"  class="form-select">
									<option value="a">A</option>
								</select>
							</div>
							<div class="col-3">
								<label for="status">Status</label>
								<select name="status"  class="form-select">
									<option value="a">A</option>
								</select>
							</div>
							<div class="col-3">
								<label>Create Date</label>
								<input type="text" name="daterange" class="form-control">
							</div>
							<div class="col-3">
								<label>Due Date</label>
								<input type="date" name="dueDatw" class="form-control">
							</div>
							<div class="col-3">
								<label for="area">Select Area</label>
								<select name="area"  class="form-select">
									<option value="a">A</option>
								</select>
							</div>
							<div class="col-2 mt-2">
								<label for=""></label>
								<button type="submit" class="btn btn-outline-primary form-control">Seach</button>
							</div>
							<div class="col-1 mt-2">
								<label for=""></label>
								<button class="btn btn-outline-primary form-control"><i class="bx bx-refresh" ></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover table-striped">		
					<thead>
						<tr>
							<th><input type="checkbox" name="checkbox"></th>
							<th>Id</th>
							<th>Devices</th>
							<th>Tasks</th>
							<th>Tasks Items</th>
							<th>Customer</th>
							<th>Task Type</th>
							<th>Assigned To</th>
							<th>Created Time</th>
							<th>Due On</th>
							<th>Total</th>
							<th>Status</th>
							<th>More</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="checkbox" name="checkbox"></td>
							<td>1</td>
							<td>data</td>
							<td>data</td>
							<td>data</td>
							<td>data</td>
							<td>data</td>
							<td>data</td>
							<td>data</td>
							<td>data</td>
							<td>data</td>
							<td>data</td>
							<td>data</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>				
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
	$(document).ready(function(){
		$('input[name="daterange"]').daterangepicker();
		console.log($('input[name="daterange"]'))
	    $('.fillter_btn').click(function() {
		    $('.filter_box').slideToggle("slow");
		    //$('.filter_box').slideToggle("slow");
		    // Alternative animation for example
		    // slideToggle("fast");
		});
	});
</script>
@endsection