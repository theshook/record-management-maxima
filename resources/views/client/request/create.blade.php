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
					<span><img src="{{ asset('images/CourseRegisteredBlue.png') }}" style="width: 40px; text-align: center"></span>
					TRAINING CERTIFICATE REQUEST FORM
				</h3>
				<hr class="bg-primary">
			</div>
			<form action="{{ route('request.store') }}" method="POST" id="surveyForm">
				@csrf
				<div class="form-group row">
					<label for="fullname" class="col-md-4 col-form-label text-primary">
						FULL NAME:
					</label>
					<div class="col-md-4">
						<input type="text" id="fullname" class="form-control" name="fullname" placeholder="Full Name of Student" autofocus>
					</div>
				</div>

				<div class="form-group row">
					<label for="qualification" class="col-md-4 col-form-label text-primary">
						QUALIFICATION / COURSE TAKEN:
					</label>
					<div class="col-md-4">
							<select class="form-control" data-val="true" data-val-text="The qualification must be text." data-val-required="Please select Qualification" id="qualification" name="qualification">
							@foreach ($qualifications as $q)
								<option value="{{ $q->id }}">{{ $q->course }}</option>
							@endforeach
						</select>                    
					</div>
				</div>
					
				
				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						ADDRESS:
					</label>
					<div class="col-md-4">
						<input type="text" id="address" class="form-control" name="address" placeholder="Address of the student" autofocus>
					</div>
				</div>

				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						Contact Number:
					</label>
					<div class="col-md-4">
						<input type="text" id="contactno" class="form-control" name="contactno" placeholder="Write your contact number for SMS update" autofocus>
					</div>
				</div>

				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="pick-up" name="deliveryType" class="custom-control-input" value="Pick-Up" checked>
					<label class="custom-control-label text-primary" for="pick-up">Pick-Up</label>
				</div>

				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="deli-very" name="deliveryType" class="custom-control-input" value="Delivery">
					<label class="custom-control-label  text-primary" for="deli-very">Delivery</label>
				</div>

				<div class="form-group row">
					<label for="address" class="col-md-4 col-form-label text-primary">
						Delivery Address:
					</label>
					<div class="col-md-4">
					<input type="text" id="deliveryaddress" class="form-control" name="deliveryAddress" placeholder="Please write your address" autofocus>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-success" id="ajaxSave">Submit</button>
			<button type="reset" class="btn btn-danger">Reset</button>
			</form>
		</div>
	</div>
</div> 
<!-- Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
			    <div class="text-center">
					<img src="{{ asset('images/GreenCheck.png') }}" style="width: 100px; text-align: center">
				</div>
				<h6 class="modal-title text-center" id="deleteModalLabel">YOUR REQUEST FOR CERTIFICATE IS NOW SEND TO THE SERVER</h6>
				<h6 class="text-center">REFERENCE NO.</h6>
				<h3 class="text-center border rounded border-dark text-danger text-monospace" id="ref_no"></h3>
				<p class="text-center text-secondary">
					NOTE: You have 24 hrs. to pay in any remittance center/bank said below. Don't forget to attach the receipt image and use the REFERENCE NO. for verification once you paid the amount
				</p>
				<h3 class="text-center text-secondary border rounded border-dark">
					P 100.00
				</h3>
				<p class="text-center text-dark">
					Account Name: Maxima Technical Skills and Training Institute Inc. 
					BPI Bank Account No. 2313 1599 1546
				</p>
				<div class="text-center">
					<img src="{{ asset('images/Cebuana.jpg') }}" style="width: 75px; text-align: center" alt="Cebuana" class="rounded border border-warning">
					<img src="{{ asset('images/MLHU.jpg') }}" style="width: 75px; text-align: center" alt="M LHUILLER" class="rounded border border-warning">
					<img src="{{ asset('images/Palawan.jpg') }}" style="width: 75px; text-align: center" alt="PALAWAN" class="rounded border border-warning">
					<img src="{{ asset('images/LBC.jpg') }}" style="width: 75px; text-align: center" alt="LBC" class="rounded border border-warning">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()
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
				url: "{{ route('request.store') }}",
				method: 'POST',
				data: {
					fullname: jQuery('#fullname').val(),
					qualification: jQuery('#qualification').val(),
					address: jQuery('#address').val(),
					contactno: jQuery('#contactno').val(),
					deliveryType: jQuery('.custom-control-input:checked').val(),
					deliveryAddress: jQuery('#deliveryaddress').val(),
				},
				success: function(result){
					jQuery('.alert-success').show();
					jQuery('.alert-success').html(result.success);
					$("#ajaxSave").html('Submit');
					$('.alert-danger').hide();
					$('input').val('');
					document.getElementById("ref_no").innerHTML = result.ref_no;
					$("#deleteModal").modal('show');
				},
				error: function(request, status, error) {
					$('.alert-danger').empty();
					json = $.parseJSON(request.responseText);
					$.each(json.errors, function(key, value){
						$('.alert-danger').show();
						$('.alert-danger').append('<p>'+value+'</p>');
					});
					$("#ajaxSave").html('Submit');
				}
			});
		});
	});
</script>
@endsection