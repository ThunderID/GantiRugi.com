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
				{{-- <a href='javascript:;' data-form-method='get' data-form-action='{{route("admin.".$controller_name.".delete", [$data->id])}}' id='delete_btn' class='ink-reaction btn btn-sm btn-danger '>Delete</a> --}}
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
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group {{($errors->has('name') ? 'has-error has-feedback' : '')}}">
								<label for='name'>Name</label>
								<p class='form-control-static text-light'>{{$data->name}}</p>

							</div>
						</div>
						
						{{-- Code --}}
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group {{($errors->has('code') ? 'has-error has-feedback' : '')}}">
								<label for='code'>Code</label>
								<p class='form-control-static text-light'>{{$data->code}}</p>

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
								<label for='currency_code'>Currency Code</label>
								<p class='form-control-static text-light'>{{$data->currency_code}}</p>

							</div>

							<div class="form-group {{($errors->has('currency') ? 'has-error has-feedback' : '')}}">
								<label for='currency'>Currency</label>
								<p class='form-control-static text-light'>{{$data->currency}}</p>

							</div>
						</div>
						
						{{-- Phone Code --}}
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group {{($errors->has('phone_code') ? 'has-error has-feedback' : '')}}">
								<label for='phone_code'>Phone Code</label>
								<p class='form-control-static text-light'>+{{$data->phone_code}}</p>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('css')
@stop

@section('js')
	<script>
		$('#delete_btn').type2confirm();
	</script>
@stop