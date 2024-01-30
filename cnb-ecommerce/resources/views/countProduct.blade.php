<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row my-2">
			<div class="col-12">
				<div class="card p-4">
					<form method="get" class="d-flex align-items-end">
						<div class="form-group mr-2">
						    <label for="dateStart">Date Start</label>
						    <input type="date" class="form-control" id="dateStart" name="dateStart"
						    	value="{{ Request::get('dateStart') }}"
						    >
						</div>
						<div class="form-group mr-4">
						    <label for="dateEnd">Date End</label>
						    <input type="date" class="form-control" id="dateEnd" name="dateEnd"
						    	value="{{ Request::get('dateEnd') }}"
						    >
						</div>
						<div class="form-group">
						    <label></label>
						    <button class="btn btn-success">Search</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@if(Request::get('dateStart')!='' && Request::get('dateEnd')!='')
		<div class="row">
			<div class="col-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Flash sale</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Product</a>
					</li>
				</ul>
			</div>
			<div class="col-12">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<table class="table w-100">
							<thead>
								<tr>
									<th style="width: 100px;">ID</th>
									<th>Name</th>
									<th style="width: 500px;">Product</th>
								</tr>
							</thead>
							<tbody>
								@foreach($group['flashsale'] as $key => $value)
								<tr>
									<td>{{ $key }}</td>
									<td>{{ $value['product']->name }}</td>
									<td>
										<table class="table table-bordered">
											<thead>
												<tr>
													<th style="width: 200px;">dis1</th>
													<th style="width: 200px;">dis2</th>
													<th style="width: 100px;">amount</th>
												</tr>
											</thead>
											<tbody>
												@foreach($value['data'] as $order_key => $order_value)
													@foreach($order_value as $dis1_key => $dis1_value)
														{{-- {{ dd($dis1_value) }} --}}
														<tr>
															<td>{{ $dis1_value['dis1'] }}</td>
															<td>{{ $dis1_value['dis2'] }}</td>
															<td>{{ $dis1_value['amount'] }}</td>
														</tr>
														
													@endforeach
												@endforeach
											</tbody>
										</table>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<table class="table w-100">
							<thead>
								<tr>
									<th style="width: 100px;">ID</th>
									<th>Name</th>
									<th style="width: 500px;">Product</th>
								</tr>
							</thead>
							<tbody>
								@foreach($group['product_s'] as $key => $value)
								<tr>
									<td>{{ $key }}</td>
									<td>{{ $value['product']->name }}</td>
									<td>
										<table class="table table-bordered">
											<thead>
												<tr>
													<th style="width: 200px;">dis1</th>
													<th style="width: 200px;">dis2</th>
													<th style="width: 100px;">amount</th>
												</tr>
											</thead>
											<tbody>
												@foreach($value['data'] as $order_key => $order_value)
													@foreach($order_value as $dis1_key => $dis1_value)
														{{-- {{ dd($dis1_value) }} --}}
														<tr>
															<td>{{ $dis1_value['dis1'] }}</td>
															<td>{{ $dis1_value['dis2'] }}</td>
															<td>{{ $dis1_value['amount'] }}</td>
														</tr>
														
													@endforeach
												@endforeach
											</tbody>
										</table>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</body>
</html>