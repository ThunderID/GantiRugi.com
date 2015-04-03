@section('breadcrumb')
	<li>Home</li>
	<li>{!! HTML::link(route('admin.'.$controller_name .'.index'), ucwords(str_plural($controller_name))) !!}</li>
	<li class='active'>{{!$data->id ? 'Create' : 'Edit'}}</li>
@stop

@section('content')
	{!! Form::open(['url' => route('admin.' . $controller_name . '.store', $data->id), 'class' => 'form', 'files' => true]) !!}

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href='{{route("admin.".$controller_name.".index")}}' class='text-primary ink-reaction'>
				<span class='md md-keyboard-arrow-left'></span>
				All {{str_plural($controller_name)}}
			</a>
			{!! Form::submit('Save', ['class' => 'btn btn-flat btn-primary ink-reaction pull-right']) !!}
		</div>
	</div>

	<br>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class='card'>
				<div class='card-body'>
					<div class="row">
						{{-- Name --}}
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group {{($errors->has('name') ? 'has-error has-feedback' : '')}}">
								{!! Form::text('name', $data->name, ['class' => ' form-control text-light', 'id' => 'name', 'tabindex' => 1])!!}
								<label for='name'>Name</label>
								@if ($errors->has('name'))
									<span class='glyphicon glyphicon-remove form-control-feedback'></span>
								@endif
							</div>
						</div>
						
						{{-- Short Name --}}
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group {{($errors->has('short_name') ? 'has-error has-feedback' : '')}}">
								{!! Form::text('short_name', $data->short_name, ['class' => ' form-control text-light', 'id' => 'short_name', 'tabindex' => 1])!!}
								<label for='short_name'>Short Name</label>
								@if ($errors->has('short_name'))
									<span class='glyphicon glyphicon-remove form-control-feedback'></span>
								@endif
							</div>
						</div>

						{{-- Country --}}
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group {{($errors->has('country') ? 'has-error has-feedback' : '')}}">
								{!! Form::select('country', $country_list,$data->country->id, ['class' => 'select2 form-control text-light', 'id' => 'country', 'tabindex' => 1])!!}
								<label for='country'>Country</label>
								@if ($errors->has('country'))
									<span class='glyphicon glyphicon-remove form-control-feedback'></span>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{!! Form::close() !!}
@stop

@section('css')
@stop

@section('js')
@stop