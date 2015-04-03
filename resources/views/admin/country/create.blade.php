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
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group {{($errors->has('name') ? 'has-error has-feedback' : '')}}">
								{!! Form::text('name', $data->name, ['class' => ' form-control text-light', 'id' => 'name', 'tabindex' => 1])!!}
								<label for='name'>Name</label>
								@if ($errors->has('name'))
									<span class='glyphicon glyphicon-remove form-control-feedback'></span>
								@endif
							</div>
						</div>
						
						{{-- Code --}}
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group {{($errors->has('code') ? 'has-error has-feedback' : '')}}">
								{!! Form::text('code', $data->code, ['class' => ' form-control text-light', 'id' => 'code', 'tabindex' => 1])!!}
								<label for='code'>Code</label>
								@if ($errors->has('code'))
									<span class='glyphicon glyphicon-remove form-control-feedback'></span>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class='card'>
				<div class='card-body'>
					<div class="row">
						{{-- Currency --}}
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group {{($errors->has('currency_code') ? 'has-error has-feedback' : '')}}">
								{!! Form::text('currency_code', $data->currency_code, ['class' => ' form-control text-light', 'id' => 'currency_code', 'tabindex' => 1])!!}
								<label for='currency_code'>Currency Code</label>
								@if ($errors->has('currency_code'))
									<span class='glyphicon glyphicon-remove form-control-feedback'></span>
								@endif
							</div>

							<div class="form-group {{($errors->has('currency') ? 'has-error has-feedback' : '')}}">
								{!! Form::text('currency', $data->currency, ['class' => ' form-control text-light', 'id' => 'currency', 'tabindex' => 1])!!}
								<label for='currency'>Currency</label>
								@if ($errors->has('currency'))
									<span class='glyphicon glyphicon-remove form-control-feedback'></span>
								@endif
							</div>
						</div>
						
						{{-- Phone Code --}}
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group {{($errors->has('phone_code') ? 'has-error has-feedback' : '')}}">
								{!! Form::text('phone_code', $data->phone_code, ['class' => ' form-control text-light', 'id' => 'phone_code', 'tabindex' => 1])!!}
								<label for='phone_code'>Phone Code</label>
								@if ($errors->has('phone_code'))
									<span class='glyphicon glyphicon-remove form-control-feedback'></span>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<br>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
			{!! Form::submit('Save', ['class' => 'btn btn-flat btn-primary ink-reaction']) !!}
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