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
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							{{-- Name --}}
							<div class="form-group {{($errors->has('name') ? 'has-error has-feedback' : '')}}">
								{!! Form::text('name', $data->name, ['class' => ' form-control text-light', 'id' => 'name', 'tabindex' => 1])!!}
								<label for='name'>Name</label>
								@if ($errors->has('name'))
									<span class='glyphicon glyphicon-remove form-control-feedback'></span>
								@endif
							</div>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							{{-- Name --}}
							<div class="form-group {{($errors->has('province') ? 'has-error has-feedback' : '')}}">
								{!! Form::select('province', $province_list,$data->province->id, ['class' => 'select2 form-control text-light', 'id' => 'province', 'tabindex' => 1])!!}
								<label for='province'>Province, Country</label>
								@if ($errors->has('province'))
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
	{!! HTML::style('css/summernote.css')!!}	
	{!! HTML::style('css/dropzone-theme.css')!!}	
@stop

@section('js')
	{!! HTML::script('js/summernote.min.js')!!}	
	<script>
		$('.summernote').summernote({
			height: 327,
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough']],
				['fontsize', ['fontsize']],
				['para', ['ul', 'ol', 'paragraph']],
			  ]
		});

		$('#logo').thumbnail_image_upload();
	</script>
@stop