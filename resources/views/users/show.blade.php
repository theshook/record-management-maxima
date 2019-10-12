@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<h3 class="mb-0">
					<span><img src="images/AdminBlue.png" style="width: 40px; text-align: center"></span>
					SHOW ADMIN PROFILE
				</h3>
				<hr class="bg-primary">
			</div>
			
			<form action="{{ route('users.update', $user->id) }}" method="POST">
			<div class="form-group row">
				<label for="training_center" class="col-md-4 col-form-label text-primary">
					EMPLOYEE POSITION:
				</label>
					<div class="col-md-4">
						<select class="form-control" data-val="true" id="Position" name="position">
						<option value="director" {{ $user->position == 'director' ? 'selected':'' }} >School Director</option>
						<option value="schoolhead" {{ $user->position == 'schoolhead' ? 'selected':'' }}>School Head</option>
						<option value="adminstaff" {{ $user->position == 'adminstaff' ? 'selected':'' }}>Admin Staff</option>
						<option value="trainer" {{ $user->position == 'trainer' ? 'selected':'' }}>Trainer</option>
					</select>
				</div>
			</div>
			<hr class="bg-primary">
			<div class="form-group">
				<h5 class="text-white bg-primary p-2">2. PROFILE</h5>
			</div>
			<div class="form-group row">
				<label for="last_name" class="col-md-4 col-form-label text-primary">
					SURNAME:
				</label>
				<div class="col-md-8">
					<input type="text" id="last_name" class="form-control" name="last_name" placeholder="SURNAME" value="{{ $user->last_name }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="first_name" class="col-md-4 col-form-label text-primary">
					FIRST NAME:
				</label>
				<div class="col-md-8">
					<input type="text" id="first_name" class="form-control" name="first_name" placeholder="FIRST NAME" value="{{ $user->first_name }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="middle_name" class="col-md-4 col-form-label text-primary">
					MIDDLE NAME:
				</label>
				<div class="col-md-4">
					<input type="text" id="middle_name" class="form-control" name="middle_name" placeholder="MIDDLE NAME" value="{{ $user->middle_name }}">
				</div>
				<label for="name_extension" class="col-md-2 col-form-label text-primary">
					NAME EXTENSION:
				</label>
				<div class="col-md-2">
					<input type="text" id="name_extension" class="form-control" name="name_extension" placeholder="NAME EXTENSION" value="{{ $user->name_extension }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="street" class="col-md-4 col-form-label text-primary">
					PERMANENT ADDRESS:
				</label>
				<div class="col-md-2">
					<input type="text" id="street" class="form-control" name="street" placeholder="Number, Street" value="{{ $user->street }}">
				</div>
				<div class="col-md-2">
					<input type="text" id="barangay" class="form-control" name="barangay" placeholder="Barangay" value="{{ $user->barangay }}">
				</div>
				<div class="col-md-4">
					<input type="text" id="municipality" class="form-control" name="municipality" placeholder="Municipality" value="{{ $user->municipality }}">
				</div>
			</div>

			<div class="form-group row">
				<label for="city" class="col-md-4 col-form-label text-primary"></label>
				<div class="col-md-2">
					<select name="district" id="District" class="form-control" required>
						<option value="I" {{ $user->district == 'I' ? 'selected':'' }}>I</option>
						<option value="II" {{ $user->district == 'II' ? 'selected':'' }}>II</option>
						<option value="III" {{ $user->district == 'II' ? 'selected':'' }}>III</option>
						<option value="IV" {{ $user->district == 'IV' ? 'selected':'' }}>IV</option>
						<option value="V" {{ $user->district == 'V' ? 'selected':'' }}>V</option>
						<option value="VI" {{ $user->district == 'VI' ? 'selected':'' }}>VI</option>
						<option value="VII" {{ $user->district == 'VII' ? 'selected':'' }}>VII</option>
						<option value="VIII" {{ $user->district == 'VIII' ? 'selected':'' }}>VIII</option>
						<option value="Lone District" {{ $user->district == 'Lone District' ? 'selected':'' }}>Lone District</option>
						<option value="1st(North) District" {{ $user->district == '1st(North) District' ? 'selected':'' }}>1st(North) District</option>
						<option value="2nd(South) District" {{ $user->district == '2nd(South) District' ? 'selected':'' }}>1st(South) District</option>
					</select>
					<span class="field-validation-valid text-danger" data-valmsg-for="District" data-valmsg-replace="true"></span>
				</div>
				<div class="col-md-2">
					<input type="text" id="province" class="form-control" name="province" placeholder="Province" value="{{ $user->province }}">
				</div>
				<div class="col-md-2">
					<select class="form-control" data-val="true" data-val-number="The field Region must be a number." data-val-required="Please select Region" id="RegionId" name="region">
						<option value="Region I - Ilocos" {{ $user->region == 'Region I - Ilocos' ? 'selected':'' }}>Region I - Ilocos</option>
						<option value="Region II - Cagayan Valley" {{ $user->region == 'Region II - Cagayan Valley' ? 'selected':'' }}>Region II - Cagayan Valley</option>
						<option value="Region III - Central Luzon" {{ $user->region == 'Region III - Central Luzon' ? 'selected':'' }}>Region III - Central Luzon</option>
						<option value="Region IVA - CALABARZON" {{ $user->region == 'Region IVA - CALABARZON' ? 'selected':'' }}>Region IVA - CALABARZON</option>
						<option value="Region IVB - MIMAROPA" {{ $user->region == 'Region IVB - MIMAROPA' ? 'selected':'' }}>Region IVB - MIMAROPA</option>
						<option value="Region V - Bicol" {{ $user->region == 'Region V - Bicol' ? 'selected':'' }}>Region V - Bicol</option>
						<option value="Region VI - Western Visayas" {{ $user->region == 'Region VI - Western Visayas' ? 'selected':'' }}>Region VI - Western Visayas</option>
						<option value="Region VII - Central Visayas" {{ $user->region == 'Region VII - Central Visayas' ? 'selected':'' }}>Region VII - Central Visayas</option>
						<option value="Region VIII - Eastern Visayas" {{ $user->region == 'Region VIII - Eastern Visayas' ? 'selected':'' }}>Region VIII - Eastern Visayas</option>
						<option value="Region IX - Zamboanga Peninsula" {{ $user->region == 'Region IX - Zamboanga Peninsula' ? 'selected':'' }}>Region IX - Zamboanga Peninsula</option>
						<option value="Region X - Northern Mindanao" {{ $user->region == 'Region X - Northern Mindanao' ? 'selected':'' }}>Region X - Northern Mindanao</option>
						<option value="Region XI - Davao" {{ $user->region == 'Region XI - Davao' ? 'selected':'' }}>Region XI - Davao</option>
						<option value="Region XII - SOCCSKSARGEN" {{ $user->region == 'Region XII - SOCCSKSARGEN' ? 'selected':'' }}>Region XII - SOCCSKSARGEN</option>
						<option value="National Capital Region (NCR)" {{ $user->region == 'National Capital Region (NCR)' ? 'selected':'' }}>National Capital Region (NCR)</option>
						<option value="Cordillera Administrative Region (CAR)" {{ $user->region == 'Cordillera Administrative Region (CAR)' ? 'selected':'' }}>Cordillera Administrative Region (CAR)</option>
						<option value="Region XIII - CARAGA" {{ $user->region == 'Region XIII - CARAGA' ? 'selected':'' }}>Region XIII - CARAGA</option>
						<option value="Autonomous Region in Muslim Mindanao (ARMM)" {{ $user->region == 'Autonomous Region in Muslim Mindanao (ARMM)' ? 'selected':'' }}>Autonomous Region in Muslim Mindanao (ARMM)</option>
						<option value="Other Country" {{ $user->region == 'Other Country' ? 'selected':'' }}>Other Country</option>
					</select>
					<span class="field-validation-valid text-danger" data-valmsg-for="RegionId" data-valmsg-replace="true"></span>
				</div>
				<div class="col-md-2">
					<input type="text" id="zipcode" class="form-control" name="zipcode" placeholder="Zipcode" value="{{ $user->zipcode }}">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-1">
					<label for="mother_name" class="text-primary @error('sex') text-danger font-weight-bold @enderror">Sex</label>
					<div class="custom-control custom-radio">
						<input type="radio" id="male" name="sex" class="custom-control-input" value="Male" {{ $user->sex == 'Male' ? 'checked':'' }}>
						<label class="custom-control-label  text-primary" for="male">Male</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="female" name="sex" class="custom-control-input text-primary" value="Female" {{ $user->sex == 'Female' ? 'checked':'' }}>
						<label class="custom-control-label  text-primary" for="female">Female</label>
					</div>
				</div>

				<div class="col-md-2">
					<label for="mother_name" class="text-primary">Civil Status</label>
					<div class="custom-control custom-radio">
						<input type="radio" id="single" name="civil_status" class="custom-control-input" value="Single" {{ $user->civil_status == 'Single' ? 'checked':'' }}>
						<label class="custom-control-label  text-primary" for="single">Single</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="married" name="civil_status" class="custom-control-input text-primary" value="Married" {{ $user->civil_status == 'Married' ? 'checked':'' }}>
						<label class="custom-control-label  text-primary" for="married">Married</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="widow" name="civil_status" class="custom-control-input text-primary" value="Widow" {{ $user->civil_status == 'Widow' ? 'checked':'' }} >
						<label class="custom-control-label  text-primary" for="widow">Widow</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="separated" name="civil_status" class="custom-control-input text-primary" value="Separated" {{ $user->civil_status == 'Separated' ? 'checked':'' }}>
						<label class="custom-control-label  text-primary" for="separated">Separated</label>
					</div>
				</div>

				<div class="col-md-3">
					<label for="mother_name" class="text-primary">Contact Number(s)</label>
					<div class="form-group">
						<input type="number" class="form-control" name="tel" placeholder="Telephone" value="{{ $user->tel }}">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" name="mobile" placeholder="Mobile" value="{{ $user->mobile }}">
					</div>
				</div>

				<div class="col-md-2">
					<label for="birthdate" class="col-md-2 col-form-label text-primary">
						BIRTHDATE:
					</label>
					<br>
					<label for="email" class="col-md-2 col-form-label text-primary">
						EMAIL:
					</label>
					<br>
					<label for="password" class="col-md-2 col-form-label text-primary">
						PASSWORD:
					</label>
				</div>

				<div class="col-md-4">
					<input type="date" id="birthdate" class="form-control" name="birthdate" placeholder="BIRHTDATE" value="{{ $user->birthdate }}">
					<input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}" readonly>
					<input type="password" id="password" class="form-control" name="password" placeholder="Password">
				</div>
			</div>

			<hr class="bg-primary">

			<div class="form-group">
				<h5 class="text-white bg-primary p-2">3. PERSON TO NOTIFY INCASE OF EMERGENCY</h5>
			</div>

			<div class="form-group row">
				<label for="guardian" class="col-md-2 col-form-label text-primary">
					NAME:
				</label>
				<div class="col-md-3">
					<input type="text" id="guardian" class="form-control" name="guardian" placeholder="NAME OF GUARDIAN" value="{{ $user->guardian }}">
				</div>
				<label for="contactno" class="col-md-2 col-form-label text-primary">
				CONTACT#:
				</label>
				<div class="col-md-3">
					<input type="text" id="occupation" class="form-control" name="occupation" placeholder="TEL/CP# OF GUARDIAN" value="{{ $user->occupation }}">     
				</div>
			</div>

			<div class="form-group row">
				<label for="address" class="col-md-2 col-form-label text-primary">
					ADDRESS:
				</label>
				<div class="col-md-4">
					<input type="text" id="address" class="form-control" name="address" placeholder="ADDRESS OF GUARDIAN" value="{{ $user->address }}">
				</div>
			</div>
				
				@csrf
				@method('PUT')
				<button class="btn btn-success btn-xl pr-5 pl-5">Update</button>
			</form>
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
