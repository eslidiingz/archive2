<div class="row py-4 mx-0" style="background-color: #fff;">
	<div class="col-lg-6 col-md-12 col-12">
		<form role="search" action="/shop/search_product" method="GET">
			<div class="input-group flex-nowrap">
				@if (isset($_REQUEST['search']))
					<input type="search" name="search"
					class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" value="{{ $_REQUEST['search'] }}" placeholder="Search product" aria-label="search" aria-describedby="addon-wrapping">
				@else
					<input type="search" name="search"
					class="form-control" style="border: none; border-bottom: 1px solid #ced4da; border-radius: unset;" placeholder="Search product" aria-label="search" aria-describedby="addon-wrapping">
				@endif
				<div class="input-group-prepend">
					<button type="submit" class="input-group-text" style="border: none; background-color: unset;border-bottom: 1px solid #ced4da;border-radius: unset;" id="addon-wrapping"><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>
			</div>
		</form>
	</div>
</div>