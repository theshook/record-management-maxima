@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<h3 class="mb-0">
					<span><img src="images/AdminBlue.png" style="width: 40px; text-align: center"></span>
					{{ isset($assessor) ? 'EDIT ASSESSOR' : 'ADD NEW ASSESSOR' }}
				</h3>
				<hr class="bg-primary">
			</div>

			<div class="form-group">
				<h5 class="text-white bg-primary p-2">1. FIELD INFORMATION</h5>
			</div>
    
			<form action="{{ isset($assessor) ? route('assessor.update', $assessor->id) : route('assessor.store') }}"
			 method="POST">
				@csrf
				@if (isset($assessor)) 
				@method('PUT')
				@endif
				<div class="form-group row">
					<label for="training_center" class="col-md-4 col-form-label text-primary">
						QUALIFICATION ACCREDITED:
					</label>
					<div class="col-md-4">
						<select class="form-control" data-val="true" data-val-text="The qualification must be text." data-val-required="Please select Qualification" id="Qualification" name="qualification_id">
							@foreach ($qualifications as $qualification)
								<option value="{{ $qualification->id }}" {{$assessor->qualification_id == $qualification->id ? 'selected' : ''}}>{{ $qualification->course }}</option>
							@endforeach
						</select>
					</div>
				</div>
    
				<hr class="bg-primary">
    
				<div class="form-group">
					<h5 class="text-white bg-primary p-2">2. PERSONAL PROFILE</h5>
				</div>
    
				<div class="form-group row">
					<label for="last_name" class="col-md-4 col-form-label text-primary">
						SURNAME:
					</label>
					<div class="col-md-8">
						<input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="SURNAME" 
						value="{{ isset($assessor) ? $assessor->last_name : old('last_name') }}">

						@error('last_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
    
				<div class="form-group row">
					<label for="first_name" class="col-md-4 col-form-label text-primary">
						FIRST NAME:
					</label>
					<div class="col-md-8">
						<input type="text" id="first_name" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" placeholder="FIRST NAME"
						value="{{ isset($assessor) ? $assessor->first_name : old('first_name') }}">

						@error('first_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
    
				<div class="form-group row">
					<label for="middle_name" class="col-md-4 col-form-label text-primary">
						MIDDLE NAME:
					</label>
					<div class="col-md-4">
						<input type="text" id="middle_name" class="form-control  @error('middle_name') is-invalid @enderror" name="middle_name" placeholder="MIDDLE NAME"
						value="{{ isset($assessor) ? $assessor->middle_name : old('middle_name') }}">

						@error('middle_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<label for="name_extension" class="col-md-2 col-form-label text-primary">
						NAME EXTENSION:
					</label>
					<div class="col-md-2">
						<input type="text" id="name_extension" class="form-control @error('name_extension') is-invalid @enderror" name="name_extension" placeholder="NAME EXTENSION"
						value="{{ isset($assessor) ? $assessor->name_extension : old('name_extension') }}">

						@error('name_extension')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
    
				<div class="form-group row">
					<label for="acnumber" class="col-md-4 col-form-label text-primary">
						ACCREDITATION NUMBER:
					</label>
					<div class="col-md-4">
						<input type="text" id="acnumber" class="form-control @error('accreditation_number') is-invalid @enderror" name="accreditation_number" placeholder="Accreditation Number"
						value="{{ isset($assessor) ? $assessor->accreditation_number : old('accreditation_number') }}">

						@error('accreditation_number')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

				<hr class="bg-primary">

				<button type="submit" class="btn btn-success btn-xl pr-5 pl-5">Submit</button>
				<button type="reset" class="btn btn-danger btn-xl pr-5 pl-5">Reset</button>
			</form>
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
