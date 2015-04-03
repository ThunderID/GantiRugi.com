@section('table')
	<table class="table table-responsive no-margin">
		<thead>
			<tr>
				<th></th>
				<th>#</th>
				<th>Country</th>
				<th>Phone Code</th>
				<th>Tours</th>
				<th>Vendors</th>
			</tr>
		</thead>
		<tbody class='text-sm text-light'>
			@if ($data->count())
				<?php $i = -1; ?>
				@foreach ($data as $x)
					<tr >
						<td width="80">
							<a href='{{route("admin.".$controller_name.".create", [$x->id])}}' class='btn btn-flat  btn-primary'>
								<i class='md md-edit'></i>
							</a>
							<a href='{{route("admin.".$controller_name.".show", [$x->id])}}' class='btn btn-flat  btn-primary'>
								<i class='md md-list'></i>
							</a>
						</td>
						<td>{{$data->firstItem() + ++$i}}</td>
						<td>{{$x->name}}</td>
						<td>+{{$x->phone_code}}</td>
						<td>{{'number_format($x->tours->count())'}}</td>
						<td>{{'number_format($x->vendors->count())'}}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan='5' class='text-center text-light text-xs'>No data found</td>
				</tr>
			@endif
		</tbody>
	</table>
@show