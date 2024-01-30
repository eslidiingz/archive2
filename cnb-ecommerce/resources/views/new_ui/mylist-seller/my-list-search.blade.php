{{-- @section('search') --}}
<div class="row py-4 mx-0" style="background-color: #fff;">
	<div class="col-lg-6 col-md-12 col-12">
		<form role="search" action="/shop/search_list" method="GET">
			<div class="input-group flex-nowrap">
				@if (isset($_REQUEST['search']))
					<input type="search" name="search"
					class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value="{{ $_REQUEST['search'] }}" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
				@else
					<input type="search" name="search"
					class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
				@endif
				<div class="input-group-prepend">
					<button type="submit" class="input-group-text" style="border: none; background-color: unset;border-bottom: 1px solid #ced4da;border-radius: unset;" id="addon-wrapping"><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>
			</div>
	</div>
	<div class="col-lg-6 col-md-12 col-12">
		<div class="row align-items-center">
			<div class="col-lg col-md-12 col-12 text-lg-right text-md-left text-left mt-lg-0 mt-md-4 mt-4">
				<h6 class="mb-0">Order date</h6>
			</div>
			<div class="col-lg-4 col-md-6 col-6">
				@if (isset($_REQUEST['date_start']))
					<input type="date" name="date_start" value="{{ $_REQUEST['date_start'] }}" class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="date-start" aria-label="date-start" aria-describedby="addon-wrapping">
				@else
					<input type="date" name="date_start" class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="date-start" aria-label="date-start" aria-describedby="addon-wrapping">
				@endif
			</div>
			<div class="col-lg-4 col-md-6 col-6">
				@if (isset($_REQUEST['date_end']))
					<input type="date" name="date_end" value="{{ $_REQUEST['date_end'] }}" class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="date-end" aria-label="date-end" aria-describedby="addon-wrapping">
				@else
					<input type="date" name="date_end" class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="date-end" aria-label="date-end" aria-describedby="addon-wrapping">
				@endif
			</div>
		</div>
	</div>
</form>
</div>
{{-- @endsection --}}