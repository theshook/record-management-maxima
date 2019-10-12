@extends('layouts.appClient')
@section('content')
<div class="container">
	<div class="alert alert-success" style="display:none"></div>
	<div class="alert alert-danger" style="display:none">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="text-primary">
				<h3 class="mb-0">
					<span><img src="{{ asset('images/Feedback.png') }}" style="width: 60px; text-align: center"></span>
					CUSTOMER FEEDBACK AND CONCERNS
				</h3>
				<hr class="bg-primary">
			</div>
			<form action="{{ route('feedback.store') }}" method="POST" id="createFeedback">
				@csrf
				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						FULL NAME:
					</label>
					<div class="col-md-8">
						<input type="text" id="fullname" class="form-control @error('fullname') is-invalid @enderror" name="fullname" placeholder="Name of Sender" value="{{ old('fullname') }}" autofocus>

						@error('fullname')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						EMAIL ADDRESS:
					</label>
					<div class="col-md-8">
						<input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email address to feedback" value="{{ old('email') }}">

						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
				<br>
				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						Message:
					</label>
					<div class="col-md-8">
						<textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" cols="30" rows="5" placeholder="Write your feedback/message here">{{ old('message') }}</textarea>

						@error('message')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

				<label class="col-sm-offset-0 col-sm-0" for="note" " style="font-style: italic; color: red; padding-left: 450px;">We're happy you have your feedback.</label>

				<div class="form-group text-center">
					<button class="btn btn-success btn-sm mr-2 pr-5 pl-5" type="submit" name="submit" id="ajaxSave">
						Send
					</button>
					<button type="reset" class="btn btn-danger btn-sm pr-3 pl-3">
						Reset
					</button>
				</div>
			</form>
		</div>
	</div> 
</div>
@endsection

@section('scripts')
<script>
	jQuery(document).ready(function(){
	jQuery('#ajaxSave').click(function(e){
		e.preventDefault();
		$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			jQuery.ajax({
				url: "{{ route('feedback.store') }}",
				method: 'POST',
				data: {
					fullname: jQuery('#fullname').val(),
					email: jQuery('#email').val(),
					message: jQuery('#message').val()
				},
				success: function(result){
					jQuery('.alert-success').show();
					jQuery('.alert-success').html(result.success);
					$("#ajaxSave").html('Send');
				},
				error: function(request, status, error) {
					$('.alert-danger').empty();
					json = $.parseJSON(request.responseText);
					$.each(json.errors, function(key, value){
						$('.alert-danger').show();
						$('.alert-danger').append('<p>'+value+'</p>');
					});
					$("#ajaxSave").html('Send');
				}
			});
		});
	});
</script>
@endsection