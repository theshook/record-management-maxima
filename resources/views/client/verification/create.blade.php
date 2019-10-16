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
			<form action="{{ route('verification.store') }}" method="POST" id="surveyForm" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						FULL NAME:
					</label>
					<div class="col-md-8">
						<input type="text" id="fullname" class="form-control" name="fullname" placeholder="Name of Sender" autofocus>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						EMAIL ADDRESS:
					</label>
					<div class="col-md-8">
						<input type="email" id="email" class="form-control" name="email" placeholder="Email address of sender" autofocus>
					</div>
				</div>

				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						Control or Tracking Number:
					</label>
					<div class="col-md-8">
						<input type="text" id="tracking_number" class="form-control" name="tracking_number" placeholder="Tracking or Control Number of your Receipt" autofocus>
					</div>
				</div>

				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						Contact Number:
					</label>
					<div class="col-md-8">
						<input type="number" id="contact" class="form-control" name="contact" placeholder="Write your contact number for SMS update" autofocus>
					</div>
				</div>
				
				<div class="form-group row">
					<div class="input-group mb-3">
						<label for="training_center" class="col-md-4 col-form-label text-primary">
							Attach your Receipt Image:
							</label>
						<div class="custom-file">
								
							<input type="file" accept="image/x-png,image/gif,image/jpeg" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon01" name="image">
							<label class="custom-file-label" for="image">
									Attach you Receipt Image here...
								</label>
						</div>
					</div>
				</div>
				
				
				<div class="col-sm-0"> 
				</div>
				</div> 
				
				
				<button type="submit" name="submit" id="ajaxSave" class="btn btn-success">
				Submit
				</button>
				<button type="reset" class="btn btn-danger">
				Reset
				</button>
				
				</form>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h4 class="modal-title text-center" id="deleteModalLabel">Your Request is Now On Process</h4>
				<br>
				 <div class="text-center">
					<img src="{{ asset('images/GreenCheck.png') }}" style="width: 100px; text-align: center">
				</div>
				<br>
				<h3 class="text-center">
					NOTE: Please wait 5-7 Days process for the update.
				</h3>
				<br>
				<h4 class="text-center text-danger">
					You will receive an automated SMS once your appointment is done.
				</h4>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
	@if (session('titleMessage'))
		$("#deleteModal").modal('show');
	@endif
</script>
@endsection