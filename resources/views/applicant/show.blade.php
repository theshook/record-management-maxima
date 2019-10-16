@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="printMe">
					<div class="text-dark">
						<h3 class="mb-0">
							<span><img src="{{ asset('images/AssessmentLogoBlue.png') }}" style="width: 25px; text-align: center"></span>
							APPLY FOR ASSESSMENT
						</h3>
						<hr class="bg-dark">
					</div>
					<div class="form-group row">
						<label for="training_center" class="col-md-4 col-form-label text-dark">
							Name of School/Training Center/Company:
						</label>
						<div class="col-md-8">
							<input type="text" id="training_center" class="form-control" name="training_center" value="{{ $applicant->training_center }}" readonly>
						</div>
					</div>
	
					<div class="form-group row">
						<label for="school_address" class="col-md-4 col-form-label text-dark">
							School Address:
						</label>
						<div class="col-md-8">
							<input type="text" id="school_address" class="form-control" name="school_address" value="{{ $applicant->school_address }}" readonly>
						</div>
					</div>
	
					<div class="form-group row">
						<label for="title_assessment" class="col-md-4 col-form-label text-dark">
							Title of Assessment Applied for:
						</label>
						<div class="col-md-8">
							<input type="text" class="form-control" value="{{ $applicant->qualification->course}}" readonly>
						</div>
					</div>
	
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="fq" name="assessment_type" value="FULL QUALIFICATION" class="custom-control-input" {{$applicant->assessment_type == 'FULL QUALIFICATION' ? 'checked' : ''}} disabled>
						<label class="custom-control-label text-dark" for="fq">FULL QUALIFICATION</label>
					</div>
	
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="coc" name="assessment_type" value="COC" class="custom-control-input" {{$applicant->assessment_type == 'COC' ? 'checked' : ''}} disabled>
						<label class="custom-control-label text-dark" for="coc">COC</label>
					</div>
	
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="ren" name="assessment_type" value="RENEWAL" class="custom-control-input" {{$applicant->assessment_type == 'RENEWAL' ? 'checked' : ''}} disabled>
						<label class="custom-control-label text-dark" for="ren">RENEWAL</label>
					</div>
	
					<hr class="bg-dark">
	
					<div class="form-group">
						<h5 class="text-white bg-dark p-2">1. CLIENT TYPE</h5>
					</div>
	
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="tgs" name="client_type" value="TVET Graduate Student" class="custom-control-input" {{$applicant->client_type == 'TVET Graduate Student' ? 'checked' : ''}} disabled>
						<label class="custom-control-label text-dark" for="tgs">TVET Graduate Student</label>
					</div>
	
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="tg" name="client_type" value="TVET Graduate" class="custom-control-input"
						{{$applicant->client_type == 'TVET Graduate' ? 'checked' : ''}} disabled>
						<label class="custom-control-label text-dark" for="tg">TVET Graduate</label>
					</div>
	
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="iw" name="client_type" value="Industry Worker" class="custom-control-input"
						{{$applicant->client_type == 'Industry Worker' ? 'checked' : ''}} disabled>
						<label class="custom-control-label text-dark" for="iw">Industry Worker</label>
					</div>
	
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="k12" name="client_type" value="K-12" class="custom-control-input"
						{{$applicant->client_type == 'K-12' ? 'checked' : ''}} disabled>
						<label class="custom-control-label text-dark" for="k12">K-12</label>
					</div>
	
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="of" name="client_type" value="OFW" class="custom-control-input"
						{{$applicant->client_type == 'OFW' ? 'checked' : ''}} disabled>
						<label class="custom-control-label text-dark" for="of">OFW</label>
					</div>
	
					<hr class="bg-dark">
	
					<div class="form-group">
						<h5 class="text-white bg-dark p-2">2. PROFILE</h5>
					</div>
	
					<div class="form-group row">
						<label for="last_name" class="col-md-4 col-form-label text-dark">
							SURNAME:
						</label>
						<div class="col-md-8">
							<input type="text" id="last_name" class="form-control" name="last_name" value="{{ $applicant->last_name }}" disabled>
						</div>
					</div>
	
					<div class="form-group row">
						<label for="first_name" class="col-md-4 col-form-label text-dark">
							FIRST NAME:
						</label>
						<div class="col-md-8">
							<input type="text" id="first_name" class="form-control" name="first_name" value="{{ $applicant->first_name }}" disabled>
						</div>
					</div>
	
					<div class="form-group row">
						<label for="middle_name" class="col-md-4 col-form-label text-dark">
							MIDDLE NAME:
						</label>
						<div class="col-md-4">
							<input type="text" id="middle_name" class="form-control" name="middle_name" value="{{ $applicant->middle_name }}" disabled>
						</div>
	
						<label for="name_extension" class="col-md-2 col-form-label text-dark">
							NAME EXTENSION:
						</label>
						<div class="col-md-2">
							<input type="text" id="name_extension" class="form-control" name="name_extension" value="{{ $applicant->name_extension }}" disabled>
						</div>
					</div>
	
					<div class="form-group row">
						<label for="street" class="col-md-4 col-form-label text-dark">
							MAILING ADDRESS:
						</label>
						<div class="col-md-2">
							<input type="text" id="street" class="form-control" name="street" value="{{ $applicant->street }}" disabled>
						</div>
	
						<div class="col-md-2">
							<input type="text" id="barangay" class="form-control" name="barangay" value="{{ $applicant->barangay }}" disabled>
						</div>
	
						<div class="col-md-4">
							<input type="text" id="district" class="form-control" name="district" value="{{ $applicant->district }}" disabled>
						</div>
					</div>
	
					<div class="form-group row">
						<label for="city" class="col-md-4 col-form-label text-dark">
						</label>
						<div class="col-md-2">
							<input type="text" id="city" class="form-control" name="city" value="{{ $applicant->city }}" disabled>
						</div>
						<div class="col-md-2">
							<input type="text" id="province" class="form-control" name="province" value="{{ $applicant->province }}" disabled>
						</div>
						<div class="col-md-2">
							<input type="text" id="region" class="form-control" name="region" value="{{ $applicant->region }}" disabled>
						</div>
						<div class="col-md-2">
							<input type="text" id="zipcode" class="form-control" name="zipcode" value="{{ $applicant->zipcode }}" disabled>
						</div>
					</div>
	
					<div class="form-group row">
						<div class="col-md-6">
							<label for="mother_name" class="text-dark">Mother's Name</label>
							<input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ $applicant->mother_name }}" disabled>
						</div>
						<div class="col-md-6">
							<label for="father_name" class="text-dark">Father's Name</label>
							<input type="text" class="form-control" id="father_name" name="father_name" value="{{ $applicant->father_name }}" disabled>
						</div>
					</div>
	
					<div class="form-group row">
						<div class="col-md-1">
							<label for="mother_name" class="text-dark">Sex</label>
							<div class="custom-control custom-radio">
								<input type="radio" id="male" name="sex" class="custom-control-input" value="Male"
								{{ $applicant->sex == 'Male' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="male">Male</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="female" name="sex" class="custom-control-input text-dark" value="Female" {{ $applicant->sex == 'Female' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="female">Female</label>
							</div>
						</div>
	
						<div class="col-md-2">
							<label for="mother_name" class="text-dark">Civil Status</label>
							<div class="custom-control custom-radio">
								<input type="radio" id="single" name="civil_status" class="custom-control-input" value="Single" {{ $applicant->civil_status == 'Single' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="single">Single</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="married" name="civil_status" class="custom-control-input text-dark" value="Married" {{ $applicant->civil_status == 'Married' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="married">Married</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="widow" name="civil_status" class="custom-control-input text-dark" value="Widow" {{ $applicant->civil_status == 'Widow' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="widow">Widow</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="separated" name="civil_status" class="custom-control-input text-dark" value="Separated" {{ $applicant->civil_status == 'Separated' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="separated">Separated</label>
							</div>
						</div>
	
						<div class="col-md-3">
							<label for="mother_name" class="text-dark">Contact Number(s)</label>
							<div class="form-group">
								<input type="number" class="form-control" name="tel" value="{{ $applicant->tel }}" disabled>
							</div>
							<div class="form-group">
								<input type="number" class="form-control" name="mobile" value="{{ $applicant->mobile }}" disabled>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" value="{{ $applicant->email }}" disabled>
							</div>
							<div class="form-group">
								<input type="number" class="form-control" name="fax" value="{{ $applicant->fax }}" disabled>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="others" value="{{ $applicant->others }}" disabled>
							</div>
						</div>
	
						<div class="col-md-4">
							<label for="mother_name" class="text-dark">Highest Educational Attainment</label>
							<div class="custom-control custom-radio">
								<input type="radio" id="eg" name="hea" value="Elementary Graduate" class="custom-control-input" {{ $applicant->hea == 'Elementary Graduate' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="eg">Elementary Graduate</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="hg" name="hea" value="High School Graudate" class="custom-control-input text-dark" {{ $applicant->hea == 'High School Graduate' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="hg">High School Graudate</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="tvetg" name="hea" value="TVET Graduate" class="custom-control-input text-dark" {{ $applicant->hea == 'TVET Graduate' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="tvetg">TVET Graduate</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="cl" name="hea" value="College Level" class="custom-control-input text-dark" {{ $applicant->hea == 'College Level' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="cl">College Level</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="cg" name="hea" value="College Graduate" class="custom-control-input text-dark" {{ $applicant->hea == 'College Graduate' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="cg">College Graduate</label>
							</div>
						</div>
	
						<div class="col-md-2">
							<label for="mother_name" class="text-dark">Employment Status</label>
							<div class="custom-control custom-radio">
								<input type="radio" id="cas" name="es" value="Casual" class="custom-control-input" {{ $applicant->es == 'Casual' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="cas">Casual</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="jo" name="es" value="Job Order" class="custom-control-input text-dark" {{ $applicant->es == 'Job Order' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="jo">Job Order</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="prob" name="es" value="Probationary" class="custom-control-input text-dark" {{ $applicant->es == 'Probationary' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="prob">Probationary</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="per" name="es" value="Permanent" class="custom-control-input text-dark" {{ $applicant->es == 'Permanent' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="per">Permanent</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="self" name="es" value="Self-Employed" class="custom-control-input text-dark" {{ $applicant->es == 'Self-Employed' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="self">Self-Employed</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="ofw" name="es" value="OFW" class="custom-control-input text-dark" {{ $applicant->es == 'OFW' ? 'checked' : '' }} disabled>
								<label class="custom-control-label  text-dark" for="ofw">OFW</label>
							</div>
						</div>
					</div>
	
					<div class="form-group row">
						<label for="birthdate" class="col-md-1 col-form-label text-dark">
							BIRTHDATE:
						</label>
						<div class="col-md-3">
							<input type="date" id="birthdate" class="form-control" name="birthdate" value="{{ $applicant->birthdate }}" disabled>
						</div>
	
						<label for="birthplace" class="col-md-2 col-form-label text-dark">
							BIRTH PLACE:
						</label>
						<div class="col-md-3">
							<input type="text" id="birthplace" class="form-control" name="birthplace" value="{{ $applicant->birthplace }}" disabled>
						</div>
						<label for="age" class="col-md-1 col-form-label text-dark">
							AGE:
						</label>
						<div class="col-md-2">
							<input type="number" id="age" class="form-control" name="age" value="{{ $applicant->age }}" disabled>
						</div>
					</div>
	
					<hr class="bg-dark">
	
					<div class="form-group mb-0 pb-0">
						<h5 class="text-white bg-dark p-2">3. WORK EXPERIENCE (NATIONAL QUALIFICATION-related)</h5>
					</div>
					<div class="form-group row mb-0 mt-0 pb-0 pt-0">
						<div class="col-md-12">
							@forelse ($applicant->workExperiences as $awe)
								<div class="input-group input_fields_wrap">
									<input type="text" name="we_nof[]" value="{{ $awe->we_nof }}" aria-label="Name of Company" class="form-control" disabled>
	
									<input type="text" name="we_pos[]" value="{{ $awe->we_pos }}" aria-label="Position" class="form-control" disabled>
	
									<input type="date" name="we_from[]" value="{{ $awe->we_from }}" aria-label="From" class="form-control" disabled>
	
									<input type="date" name="we_to[]" value="{{ $awe->we_to }}" aria-label="To" class="form-control" disabled>
	
									<input type="number" name="we_month[]" value="{{ $awe->we_month }}" aria-label="Monthly Salary" class="form-control" disabled>
	
									<input type="text" name="we_soap[]" value="{{ $awe->we_soap }}" aria-label="Status of Appointment" class="form-control" disabled>
	
									<input type="number" name="we_noye[]" value="{{ $awe->we_noye }}" aria-label="No. of Yrs. Exp." class="form-control" disabled>
								</div>
							@empty
								<div class="input-group input_fields_wrap3">
									<span>No Competency Assessment as of the moment</span>
								</div>
							@endforelse
						</div>
					</div>
	
					<div class="form-group mb-0 mt-0 pb-0 pt-0">
						<h5 class="text-white bg-dark p-2">4. Other Training/Seminars Attended (National-Qualification-related)</h5>
					</div>
					<div class="form-group row mb-0 mt-0 pb-0 pt-0">
						<div class="col-md-12">
							@forelse ($applicant->traningSeminars as $ats)
								<div class="input-group input_fields_wrap1">
									<input type="text" name="otsa_title[]" value="{{ $ats->otsa_title }}" aria-label="First name" class="form-control" disabled>
	
									<input type="text" name="otsa_venue[]" value="{{ $ats->otsa_venue }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="date" name="otsa_from[]" value="{{ $ats->otsa_from }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="date" name="otsa_to[]" value="{{ $ats->otsa_to }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="number" name="otsa_hours[]" value="{{ $ats->otsa_hours }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="text" name="otsa_conducted[]" value="{{ $ats->otsa_conducted }}" aria-label="Last name" class="form-control" disabled>
								</div>
							@empty
								<div class="input-group input_fields_wrap3">
									<span>No Competency Assessment as of the moment</span>
								</div>
							@endforelse
						</div>
					</div>
	
					<div class="form-group mb-0 mt-0 pb-0 pt-0">
						<h5 class="text-white bg-dark p-2">5.Licensure Examination(s) Passed</h5>
					</div>
					<div class="form-group row mb-0 mt-0 pb-0 pt-0">
						<div class="col-md-12">
							@forelse ($applicant->licensureExams as $ale)
								<div class="input-group input_fields_wrap2">
									<input type="text" name="le_title[]" value="{{ $ale->le_title }}" aria-label="First name" class="form-control" disabled>
	
									<input type="text" name="le_year[]" value="{{ $ale->le_year }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="date" name="le_date[]" value="{{ $ale->le_date }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="number" name="le_rating[]" value="{{ $ale->le_rating }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="text" name="le_remarks[]" value="{{ $ale->le_remarks }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="date" name="le_expiry[]" value="{{ $ale->le_expiry }}" aria-label="Last name" class="form-control" disabled>
								</div>
							@empty
								<div class="input-group input_fields_wrap3">
									<span>No Competency Assessment as of the moment</span>
								</div>
							@endforelse
						</div>
					</div>
	
					<div class="form-group mb-0 mt-0 pb-0 pt-0">
						<h5 class="text-white bg-dark p-2">6. Competency Assessment(s) Passed</h5>
					</div>
					<div class="form-group row mb-0 mt-0 pb-0 pt-0">
						<div class="col-md-12">
							@forelse ($applicant->competencyAssessments as $aca)
								<div class="input-group input_fields_wrap3">
									<input type="text" name="ca_title[]" value="{{ $aca->ca_title }}" aria-label="First name" class="form-control" disabled>
	
									<input type="text" name="ca_ql[]" value="{{ $aca->ca_ql }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="text" name="ca_is[]" value="{{ $aca->ca_is }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="text" name="ca_cn[]" value="{{ $aca->ca_cn }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="date" name="ca_di[]" value="{{ $aca->ca_di }}" aria-label="Last name" class="form-control" disabled>
	
									<input type="date" name="ca_ed[]" value="{{ $aca->ca_ed }}" aria-label="Last name" class="form-control" disabled>
								</div>
							@empty
								<div class="input-group input_fields_wrap3">
									<span>No Competency Assessment as of the moment</span>
								</div>
							@endforelse
						</div>
					</div>
				</div>
				
				<button class="btn btn-success btn-sm pl-5 pr-5" id="imking">Print</button>
			</div>
        </div>
    </div>
@endsection
@section('scripts')
	<script>
		$(document).ready(function() {
			$("#imking").click(function() {
				$("#printMe").print({
					globalStyles: false,
					mediaPrint: false,
					stylesheet: '{!! asset('css/bootstrap.css') !!}',
					noPrintSelector: ".no-print",
					iframe: false,
					append: null,
					prepend: null,
					manuallyCopyFormValues: true,
					deferred: $.Deferred(),
					timeout: 750,
					title: null,
					doctype: '<!doctype html>'
				});
			})
		});
	</script>
@endsection