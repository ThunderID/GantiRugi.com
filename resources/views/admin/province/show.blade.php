@section('breadcrumb')
	<li>Home</li>
	<li>{!! HTML::link(route('admin.'.$controller_name .'.index'), ucwords(str_plural($controller_name))) !!}</li>
	<li class='active'>{{!$data->id ? 'Create' : 'Edit'}}</li>
@stop

@section('content')

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href='{{route("admin.".$controller_name.".index")}}' class='text-primary ink-reaction'>
				<span class='md md-keyboard-arrow-left'></span>
				All {{$controller_name}}
			</a>

			<div class='pull-right'>
				<a href='{{route("admin.".$controller_name.".create", [$data->id])}}' class='ink-reaction btn btn-sm btn-primary '>Edit</a>
				<a href='javascript:;' data-form-method='get' data-form-action='{{route("admin.".$controller_name.".delete", [$data->id])}}' id='delete_btn' class='ink-reaction btn btn-sm btn-danger '>Delete</a>
			</div>
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
								<label for='name'>Name</label>
								<p class='form-control-static text-light'>{{$data->name}}</p>
							</div>
						</div>
						
						{{-- Short Name --}}
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group {{($errors->has('short_name') ? 'has-error has-feedback' : '')}}">
								<label for='short_name'>Short Name</label>
								<p class='form-control-static text-light'>{{$data->short_name}}</p>
							</div>
						</div>

						{{-- Country --}}
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group {{($errors->has('country') ? 'has-error has-feedback' : '')}}">
								<label for='country'>Country</label>
								<p class='form-control-static text-light'>{{$data->country->name}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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

		$('#logo').thumbnail_upload();
		$('#delete_btn').type2confirm();
	</script>
@stop