@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(str_plural($controller_name))}}</li>
@stop

@section('content')
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<br>
			<a href='{{route("admin.".$controller_name.".create")}}' class='btn btn-primary btn-raised ink-reaction'>Create</a>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form">
			{!! Form::open(['url' => route('admin.'.$controller_name.'.index'), 'method' => 'get', 'class' => 'form']) !!}
				<div class="form-group floating-label">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
						<div class="input-group-content">
							{!! Form::text("q", Input::get('q'), ['class' => 'form-control text-light']) !!}
							<label for="search">Search</label>
						</div>
					</div>
				</div><!--end .form-group -->
			{!! Form::close() !!}
		</div>
	</div>

	<div class='card'>
		<div class='card-body'>
			@include('admin.' . $controller_name . '.widgets.basic_table', ['data' => $data])
		</div>
		@if ($data->firstItem())
			<div class='card-actionbar-row'>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left text-regular text-default-light ">
					<br>
					Displaying {{$data->firstItem()}} - {{$data->lastItem()}} of {{$data->total()}}
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					{!! $data->render() !!}
				</div>
			</div>
		@endif
	</div>
@stop