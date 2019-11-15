@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
			<div class="text-primary">
				<h3 class="mb-0">
					<span><img src="{{ asset('images/AdminBlue.png') }}" style="width: 40px; text-align: center"></span>
					ADD NEW STUDENT
				</h3>
				<hr class="bg-primary">
			</div>
            <form action="{{ route('student.store') }}" method="POST" id="surveyForm">
                @csrf
                <div class="form-group row">
                    <label for="training_center" class="col-md-4 col-form-label text-primary">
                        QUALIFICATION / COURSE TO BE TAKEN:
                    </label>
                    <div class="col-md-4">
                        <select class="form-control" data-val="true" data-val-text="The qualification must be text." data-val-required="Please select Qualification" id="Qualification" name="qualification_id">
                            @foreach ($qualifications as $q)
                                <option value="{{ $q->id }}">{{ $q->course }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                        <hr class="bg-primary">
                <div class="form-group">
                    <h5 class="text-white bg-primary p-2">1. CLIENT TYPE</h5>
                </div>
    
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="twsp" name="client_type" value="TWSP Student" class="custom-control-input">
                    <label class="custom-control-label text-primary" for="twsp">TWSP Student</label>
                </div>
    
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="regular" name="client_type" value="Regular / Tutorial Student" class="custom-control-input">
                    <label class="custom-control-label text-primary" for="regular">Regular / Tutorial Student</label>
                </div>
    
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="jdvp" name="client_type" value="JDVP Student" class="custom-control-input">
                    <label class="custom-control-label text-primary" for="jdvp">JDVP Student</label>
                </div>
    
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="other" name="client_type" value="Other" class="custom-control-input">
                    <label class="custom-control-label text-primary" for="other">Other</label>
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
                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="SURNAME">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="first_name" class="col-md-4 col-form-label text-primary">
                        FIRST NAME:
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="first_name" class="form-control" name="first_name" placeholder="FIRST NAME">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="middle_name" class="col-md-4 col-form-label text-primary">
                        MIDDLE NAME:
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="middle_name" class="form-control" name="middle_name" placeholder="MIDDLE NAME">
                    </div>

                    <label for="name_extension" class="col-md-2 col-form-label text-primary">
                        NAME EXTENSION:
                    </label>
                    <div class="col-md-2">
                        <input type="text" id="name_extension" class="form-control" name="name_extension" placeholder="NAME EXTENSION">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="street" class="col-md-4 col-form-label text-primary">
                        MAILING ADDRESS:
                    </label>
                    <div class="col-md-2">
                        <input type="text" id="street" class="form-control" name="street" placeholder="Number, Street">
                    </div>

                    <div class="col-md-2">
                        <input type="text" id="barangay" class="form-control" name="barangay" placeholder="Barangay">
                    </div>

                    <div class="col-md-4">
                        <input type="text" id="municipality" class="form-control" name="municipality" placeholder="Municipality">
                    </div>
                </div>
    
                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-primary">
                    </label>
                    <div class="col-md-2">
                        <input type="text" id="district" class="form-control" name="district" placeholder="District">
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="province" class="form-control" name="province" placeholder="Province">
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="region" class="form-control" name="region" placeholder="Region">
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="zipcode" class="form-control" name="zipcode" placeholder="Zipcode">
                    </div>
                </div>
    
                <div class="form-group row">
                    <div class="col-md-1">
                        <label for="mother_name" class="text-primary @error('sex') text-danger font-weight-bold @enderror">Sex</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="male" name="sex" class="custom-control-input" value="Male">
                            <label class="custom-control-label  text-primary" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="female" name="sex" class="custom-control-input text-primary" value="Female">
                            <label class="custom-control-label  text-primary" for="female">Female</label>
                        </div>
                    </div>
    
                    <div class="col-md-2">
                        <label for="mother_name" class="text-primary">Civil Status</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="single" name="civil_status" class="custom-control-input" value="Single">
                            <label class="custom-control-label  text-primary" for="single">Single</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="married" name="civil_status" class="custom-control-input text-primary" value="Married">
                            <label class="custom-control-label  text-primary" for="married">Married</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="widow" name="civil_status" class="custom-control-input text-primary" value="Widow">
                            <label class="custom-control-label  text-primary" for="widow">Widow</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="separated" name="civil_status" class="custom-control-input text-primary" value="Separated">
                            <label class="custom-control-label  text-primary" for="separated">Separated</label>
                        </div>
                    </div>
    
                    <div class="col-md-3">
                        <label for="mother_name" class="text-primary">Contact Number(s)</label>
                        <div class="form-group">
                            <input type="number" class="form-control" name="tel" placeholder="Telephone">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="mobile" placeholder="Mobile">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
    
                    <div class="col-md-2">
                        <label for="mother_name" class="text-primary">Employement Status</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="reg" name="employment_status" value="Regular" class="custom-control-input">
                            <label class="custom-control-label  text-primary" for="reg">Regular</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="hg" name="employment_status" value="Contractual" class="custom-control-input text-primary">
                            <label class="custom-control-label  text-primary" for="hg">Contractual</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="tvetg" name="employment_status" value="Probationary" class="custom-control-input text-primary">
                            <label class="custom-control-label  text-primary" for="tvetg">Probationary</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="cl" name="employment_status" value="Student" class="custom-control-input text-primary">
                            <label class="custom-control-label  text-primary" for="cl">Student</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="cg" name="employment_status" value="Trainer/OJT" class="custom-control-input text-primary">
                            <label class="custom-control-label  text-primary" for="cg">Trainer/OJT</label>
                        </div>
                    </div>
    
                    <div class="col-md-2">
                        <label for="Employment_Type" class="text-primary">Employment Type</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="wage" name="employment_type" value="Wage Employed" class="custom-control-input">
                            <label class="custom-control-label  text-primary" for="wage">Wage Employed</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="self" name="employment_type" value="Self-Employed" class="custom-control-input text-primary">
                            <label class="custom-control-label  text-primary" for="self">Self-Employed</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="prob1" name="employment_type" value="Unemployed" class="custom-control-input text-primary">
                            <label class="custom-control-label  text-primary" for="prob1">Unemployed</label>
                        </div>
                    </div>
                </div>
                        <hr class="bg-primary">
                <div class="form-group">
                    <h5 class="text-white bg-primary p-2">3. PERSONAL INFORMATION</h5>
                </div>
                        
                <div class="form-group row">
                    <label for="birthdate" class="col-md-1 col-form-label text-primary">
                        BIRTHDATE:
                    </label>
                    <div class="col-md-3">
                        <input type="date" id="birthdate" class="form-control" name="birthdate" placeholder="BIRTH DATE">
                    </div>

                    <label for="age" class="col-md-1 col-form-label text-primary">
                        AGE:
                    </label>
                    <div class="col-md-1">
                        <input type="age" id="age" class="form-control" name="age" placeholder="AGE">
                    </div>

                    <label for="weight" class="col-md-1 col-form-label text-primary">
                        WEIGHT:
                    </label>
                    <div class="col-md-3">
                        <input type="weight" id="weight" class="form-control" name="weight" placeholder="WEIGHT">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="birthplace" class="col-md-1 col-form-label text-primary">
                        BIRTHPLACE:
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="birthplace" class="form-control" name="birthplace" placeholder="BIRTHPLACE">
                    </div>
                    <label for="eyecolor" class="col-md-2 col-form-label text-primary">
                        EYE COLOR:
                    </label>
                    <div class="col-md-3">
                        <input type="text" id="eyecolor" class="form-control" name="eyecolor" placeholder="EYE COLOR">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="citizenship" class="col-md-1 col-form-label text-primary">
                        CITIZENSHIP:
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="citizenship" class="form-control" name="citizenship" placeholder="NATIONALITY">
                    </div>
                    <label for="eyecolor" class="col-md-2 col-form-label text-primary">
                        HAIR COLOR:
                    </label>
                    <div class="col-md-3">
                        <input type="text" id="haircolor" class="form-control" name="haircolor" placeholder="HAIR COLOR">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="religion" class="col-md-1 col-form-label text-primary">
                        RELIGION:
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="religion" class="form-control" name="religion" placeholder="RELIGION">
                    </div>
                        <label for="bloodtype" class="col-md-2 col-form-label text-primary">
                        BLOODTYPE:
                    </label>
                    <div class="col-md-3">
                        <input type="text" id="bloodtype" class="form-control" name="bloodtype" placeholder="BLOOD TYPE">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="birthplace" class="col-md-1 col-form-label text-primary">
                        DISABILITY:
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="disability" class="form-control" name="disability" placeholder="DISABILITY">
                    </div>
                        <label for="sssno" class="col-md-2 col-form-label text-primary">
                        SSS NO:
                    </label>
                    <div class="col-md-3">
                        <input type="text" id="sssno" class="form-control" name="sssno" placeholder="SSS ID NO.">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ethnicity" class="col-md-1 col-form-label text-primary">
                        ETHNICITY:
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="ethnicity" class="form-control" name="ethnicity" placeholder="ETHNICITY">
                    </div>
                        <label for="gsisno" class="col-md-2 col-form-label text-primary">
                        GSIS NO:
                    </label>
                    <div class="col-md-3">
                        <input type="text" id="gsisno" class="form-control" name="gsisno" placeholder="GSIS ID NO.">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="height" class="col-md-1 col-form-label text-primary">
                        HEIGHT:
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="height" class="form-control" name="height" placeholder="HEIGHT">
                    </div>
                        <label for="tinno" class="col-md-2 col-form-label text-primary">
                        TIN NO:
                    </label>
                    <div class="col-md-3">
                        <input type="text" id="tinno" class="form-control" name="tinno" placeholder="TIN ID NO.">
                    </div>  
                </div>
    
                <div class="form-group">
                    <h5 class="text-white bg-primary p-2">4. EDUCATIONAL BACKGROUND</h5>
                </div>

                <div class="form-group row">
                    <label for="father" class="col-md-2 col-form-label text-primary">
                        ELEMENTARY :
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="elemschool" class="form-control" name="elemschool" placeholder="Name of school">
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="elemadd" class="form-control" name="elemadd" placeholder="Address of school">
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="father" class="col-md-2 col-form-label text-primary">
                        HIGHSCHOOL :
                    </label>
                    <div class="col-md-4">
                        <input type="text" id="highchool" class="form-control" name="highschool" placeholder="Name of school">
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="highadd" class="form-control" name="highadd" placeholder="Address of school">
                    </div>  
                </div>
                         <div class="form-group row">
                            <label for="father" class="col-md-2 col-form-label text-primary">
                                COLLEGE :
                            </label>
                                <div class="col-md-4">
                                    <input type="text" id="college" class="form-control" name="college" placeholder="Name of school">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" id="collegeadd" class="form-control" name="collegeadd" placeholder="Address of school">
                                </div>  
                         </div>
                        <div class="form-group row">
                            <label for="father" class="col-md-2 col-form-label text-primary">
                                VOCATIONAL :
                            </label>
                                <div class="col-md-4">
                                    <input type="text" id="vocational" class="form-control" name="vocational" placeholder="Name of school">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" id="vocadd" class="form-control" name="vocadd" placeholder="Address of school">
                                </div>  
                        </div>

                        <div class="form-group row">
                            <label for="father" class="col-md-2 col-form-label text-primary">
                                NAME OF FATHER:
                            </label>
                                <div class="col-md-3">
                                    <input type="text" id="father" class="form-control" name="father" placeholder="NAME OF YOUR FATHER">
                                </div>
                             <label for="tinno" class="col-md-2 col-form-label text-primary">
                                OCCUPATION:
                             </label>
                                <div class="col-md-3">
                                    <input type="text" id="occupation" class="form-control" name="occupation" placeholder="OCCUPATION">
                                </div>  
                        </div>

                        <div class="form-group row">
                            <label for="mother" class="col-md-2 col-form-label text-primary">
                                NAME OF MOTHER:
                            </label>
                                <div class="col-md-3">
                                    <input type="text" id="mother" class="form-control" name="mother" placeholder="NAME OF YOUR MOTHER">
                                </div>
                             <label for="tinno" class="col-md-2 col-form-label text-primary">
                                OCCUPATION:
                             </label>
                                <div class="col-md-3">
                                    <input type="text" id="occupation" class="form-control" name="occupation" placeholder="OCCUPATION">
                                </div>
                        </div>
                               

                        <div class="form-group row">
                            <label for="emergency" class="col-md-6 col-form-label text-primary">
                            PERSON TO NOTIFY INCASE OF EMERGENCY
                            </label>
                        </div>
                       

                    <div class="form-group row">
                            <label for="guardian" class="col-md-2 col-form-label text-primary">
                                NAME:
                            </label>
                                <div class="col-md-3">
                                    <input type="text" id="guardian" class="form-control" name="guardian" placeholder="NAME OF GUARDIAN">
                                </div>
                             <label for="contactno" class="col-md-2 col-form-label text-primary">
                                CONTACT#:
                             </label>
                                <div class="col-md-3">
                                    <input type="text" id="occupation" class="form-control" name="occupation" placeholder="TEL/CP# OF GUARDIAN">     
                                </div>
                    </div>

                    <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label text-primary">
                                ADDRESS:
                            </label>
                                <div class="col-md-4">
                                    <input type="text" id="address" class="form-control" name="address" placeholder="ADDRESS OF GUARDIAN">
                                </div>
                    </div>

                        <hr class="bg-primary">
                        <div class="form-group">
                            <h5 class="text-white bg-primary p-2">5. SCHEDULED OF TUITION FEE PAYMENT (TUTORIAL ONLY)</h5>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group input_fields_wrap">
                                    <input type="text" name="le_amount1" aria-label="Amount" class="form-control" placeholder="Amount">
                                    <input type="text" name="le_datepayment1" aria-label="DatePayment" class="form-control" placeholder="Date of Payment">
                                    <input type="text" name="le_orno1" aria-label="ORNo" class="form-control" placeholder="Official Receipt Number">
                                </div>
                                <div class="input-group input_fields_wrap">
                                    <input type="text" name="le_amount2" aria-label="Amount" class="form-control" placeholder="Amount">
                                    <input type="text" name="le_datepayment2" aria-label="DatePayment" class="form-control" placeholder="Date of Payment">
                                    <input type="text" name="le_orno2" aria-label="ORNo" class="form-control" placeholder="Official Receipt Number">
                                </div>
                            </div>
                          
                        </div>
                       
                        <button type="submit" class="btn btn-success btn-xl pr-5 pl-5">Submit</button>
                        <button type="reset" class="btn btn-danger btn-xl pr-5 pl-5">Reset</button>
                    </form>
		</div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
