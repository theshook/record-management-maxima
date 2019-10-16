@extends('layouts.appClient')
@section('content')
    <div class="container">
        @if (!$errors->isEmpty())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="text-primary">
                    <h3 class="mb-0">
                        <span><img src="{{ asset('images/AssessmentLogoBlue.png') }}" style="width: 25px; text-align: center"></span>
                        APPLY FOR ASSESSMENT
                    </h3>
                    <hr class="bg-primary">
                </div>
                <form action="{{ route('applicants.store') }}" method="POST" id="surveyForm">
                    @csrf
                    <div class="form-group row">
                        <label for="training_center" class="col-md-4 col-form-label text-primary">
                            Name of School/Training Center/Company:
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="training_center" class="form-control" name="training_center" value="{{ old('training_center') }}" placeholder="Name of School/Training Center/Company" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="school_address" class="col-md-4 col-form-label text-primary">
                            School Address:
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="school_address" class="form-control" name="school_address" placeholder="School Address" value="{{ old('school_address') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title_assessment" class="col-md-4 col-form-label text-primary">
                            Title of Assessment Applied for:
                        </label>
                        <div class="col-md-8">
                            <select name="title_assessment" id="title_assessment" class="form-control">
                                @foreach ($qualification as $q)
                                    <option value="{{$q->id}}">{{$q->course}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="fq" name="assessment_type" value="FULL QUALIFICATION" class="custom-control-input">
                        <label class="custom-control-label text-primary" for="fq">FULL QUALIFICATION</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="coc" name="assessment_type" value="COC" class="custom-control-input">
                        <label class="custom-control-label text-primary" for="coc">COC</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="ren" name="assessment_type" value="RENEWAL" class="custom-control-input">
                        <label class="custom-control-label text-primary" for="ren">RENEWAL</label>
                    </div>

                    <hr class="bg-primary">

                    <div class="form-group">
                        <h5 class="text-white bg-primary p-2">1. CLIENT TYPE</h5>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="tgs" name="client_type" value="TVET Graduate Student" class="custom-control-input">
                        <label class="custom-control-label text-primary" for="tgs">TVET Graduate Student</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="tg" name="client_type" value="TVET Graduate" class="custom-control-input">
                        <label class="custom-control-label text-primary" for="tg">TVET Graduate</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="iw" name="client_type" value="Industry Worker" class="custom-control-input">
                        <label class="custom-control-label text-primary" for="iw">Industry Worker</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="k12" name="client_type" value="K-12" class="custom-control-input">
                        <label class="custom-control-label text-primary" for="k12">K-12</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="of" name="client_type" value="OFW" class="custom-control-input">
                        <label class="custom-control-label text-primary" for="of">OFW</label>
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
                            <input type="text" id="last_name" class="form-control" name="last_name" placeholder="SURNAME" value="{{ old('last_name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="first_name" class="col-md-4 col-form-label text-primary">
                            FIRST NAME:
                        </label>
                        <div class="col-md-8">
                            <input type="text" id="first_name" class="form-control" name="first_name" placeholder="FIRST NAME" value="{{ old('first_name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="middle_name" class="col-md-4 col-form-label text-primary">
                            MIDDLE NAME:
                        </label>
                        <div class="col-md-4">
                            <input type="text" id="middle_name" class="form-control" name="middle_name" placeholder="MIDDLE NAME" value="{{ old('middle_name') }}">
                        </div>

                        <label for="name_extension" class="col-md-2 col-form-label text-primary">
                            NAME EXTENSION:
                        </label>
                        <div class="col-md-2">
                            <input type="text" id="name_extension" class="form-control" name="name_extension" placeholder="NAME EXTENSION" value="{{ old('name_extension') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="street" class="col-md-4 col-form-label text-primary">
                            MAILING ADDRESS:
                        </label>
                        <div class="col-md-2">
                            <input type="text" id="street" class="form-control" name="street" placeholder="Number, Street" value="{{ old('street') }}">
                        </div>

                        <div class="col-md-2">
                            <input type="text" id="barangay" class="form-control" name="barangay" placeholder="Barangay" value="{{ old('barangay') }}">
                        </div>

                        <div class="col-md-4">
                            <input type="text" id="district" class="form-control" name="district" placeholder="District" value="{{ old('district') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-primary">
                        </label>
                        <div class="col-md-2">
                            <input type="text" id="city" class="form-control" name="city" placeholder="City" value="{{ old('city') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="province" class="form-control" name="province" placeholder="Province" value="{{ old('province') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="region" class="form-control" name="region" placeholder="Region" value="{{ old('region') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="zipcode" class="form-control" name="zipcode" placeholder="Zipcode" value="{{ old('zipcode') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="mother_name" class="text-primary">Mother's Name</label>
                            <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="father_name" class="text-primary">Father's Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-1">
                            <label for="mother_name" class="text-primary">Sex</label>
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
                                <input type="number" class="form-control" name="tel" placeholder="Telephone" value="{{ old('tel') }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="mobile" placeholder="Mobile" value="{{ old('mobile') }}">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="fax" placeholder="Fax" value="{{ old('fax') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="others" placeholder="Others" value="{{ old('others') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="mother_name" class="text-primary">Highest Educational Attainment</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="eg" name="hea" value="Elementary Graduate" class="custom-control-input">
                                <label class="custom-control-label  text-primary" for="eg">Elementary Graduate</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="hg" name="hea" value="High School Graudate" class="custom-control-input text-primary">
                                <label class="custom-control-label  text-primary" for="hg">High School Graudate</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="tvetg" name="hea" value="TVET Graduate" class="custom-control-input text-primary">
                                <label class="custom-control-label  text-primary" for="tvetg">TVET Graduate</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="cl" name="hea" value="College Level" class="custom-control-input text-primary">
                                <label class="custom-control-label  text-primary" for="cl">College Level</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="cg" name="hea" value="College Graduate" class="custom-control-input text-primary">
                                <label class="custom-control-label  text-primary" for="cg">College Graduate</label>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="mother_name" class="text-primary">Employment Status</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="cas" name="es" value="Casual" class="custom-control-input">
                                <label class="custom-control-label  text-primary" for="cas">Casual</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="jo" name="es" value="Job Order" class="custom-control-input text-primary">
                                <label class="custom-control-label  text-primary" for="jo">Job Order</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="prob" name="es" value="Probationary" class="custom-control-input text-primary">
                                <label class="custom-control-label  text-primary" for="prob">Probationary</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="per" name="es" value="Permanent" class="custom-control-input text-primary">
                                <label class="custom-control-label  text-primary" for="per">Permanent</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="self" name="es" value="Self-Employed" class="custom-control-input text-primary">
                                <label class="custom-control-label  text-primary" for="self">Self-Employed</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="ofw" name="es" value="OFW" class="custom-control-input text-primary">
                                <label class="custom-control-label  text-primary" for="ofw">OFW</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthdate" class="col-md-1 col-form-label text-primary">
                            BIRTHDATE:
                        </label>
                        <div class="col-md-3">
                            <input type="date" id="birthdate" class="form-control" name="birthdate" placeholder="BIRTH DATE" value="{{ old('birthdate') }}">
                        </div>

                        <label for="birthplace" class="col-md-2 col-form-label text-primary">
                            BIRTH PLACE:
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="birthplace" class="form-control" name="birthplace" placeholder="BIRTH PLACE" value="{{ old('birthplace') }}">
                        </div>
                        <label for="age" class="col-md-1 col-form-label text-primary">
                            AGE:
                        </label>
                        <div class="col-md-2">
                            <input type="number" id="age" class="form-control" name="age" placeholder="AGE" value="{{ old('age') }}">
                        </div>
                    </div>

                    <hr class="bg-primary">

                    <div class="form-group">
                        <h5 class="text-white bg-primary p-2">3. WORK EXPERIENCE (NATIONAL QUALIFICATION-related)</h5>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group input_fields_wrap">
                                <input type="text" name="we_nof[]" aria-label="Name of Company" class="form-control" placeholder="Name of Company">
                                <input type="text" name="we_pos[]" aria-label="Position" class="form-control" placeholder="Position">
                                <input type="date" name="we_from[]" aria-label="From" class="form-control" placeholder="From">
                                <input type="date" name="we_to[]" aria-label="To" class="form-control" placeholder="To">
                                <input type="number" name="we_month[]" aria-label="Monthly Salary" class="form-control" placeholder="Monthly Salary">
                                <input type="text" name="we_soap[]" aria-label="Status of Appointment" class="form-control" placeholder="Status of Appointment">
                                <input type="number" name="we_noye[]" aria-label="No. of Yrs. Exp." class="form-control" placeholder="No. of Yrs. Exp.">
                                <div class="input-group-append">
                                    <button class="btn btn-primary pl-1 pr-1 add_field_button" type="button">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5 class="text-white bg-primary p-2">4. Other Training/Seminars Attended (National-Qualification-related)</h5>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group input_fields_wrap1">
                                <input type="text" name="otsa_title[]" aria-label="First name" class="form-control" placeholder="Title">
                                <input type="text" name="otsa_venue[]" aria-label="Last name" class="form-control" placeholder="Venue">
                                <input type="date" name="otsa_from[]" aria-label="Last name" class="form-control" placeholder="From">
                                <input type="date" name="otsa_to[]" aria-label="Last name" class="form-control" placeholder="To">
                                <input type="number" name="otsa_hours[]" aria-label="Last name" class="form-control" placeholder="No. Of Hours">
                                <input type="text" name="otsa_conducted[]" aria-label="Last name" class="form-control" placeholder="Conducted By">
                                <div class="input-group-append">
                                    <button class="btn btn-primary pl-1 pr-1 add_field_button1" type="button" >+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5 class="text-white bg-primary p-2">5.Licensure Examination(s) Passed</h5>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group input_fields_wrap2">
                                <input type="text" name="le_title[]" aria-label="First name" class="form-control" placeholder="Title">
                                <input type="text" name="le_year[]" aria-label="Last name" class="form-control" placeholder="Year Taken">
                                <input type="date" name="le_date[]" aria-label="Last name" class="form-control" placeholder="Examination Venue">
                                <input type="number" name="le_rating[]" aria-label="Last name" class="form-control" placeholder="Rating">
                                <input type="text" name="le_remarks[]" aria-label="Last name" class="form-control" placeholder="Remarks">
                                <input type="date" name="le_expiry[]" aria-label="Last name" class="form-control" placeholder="Expiry Date">
                                <div class="input-group-append">
                                    <button class="btn btn-primary pl-1 pr-1 add_field_button2" type="button">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5 class="text-white bg-primary p-2">6. Competency Assessment(s) Passed</h5>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group input_fields_wrap3">
                                <input type="text" name="ca_title[]" aria-label="First name" class="form-control" placeholder="Title">
                                <input type="text" name="ca_ql[]" aria-label="Last name" class="form-control" placeholder="Qualification Level">
                                <input type="text" name="ca_is[]" aria-label="Last name" class="form-control" placeholder="Industry Sector">
                                <input type="text" name="ca_cn[]" aria-label="Last name" class="form-control" placeholder="Certificate Number">
                                <input type="date" name="ca_di[]" aria-label="Last name" class="form-control" placeholder="Date of Issuance">
                                <input type="date" name="ca_ed[]" aria-label="Last name" class="form-control" placeholder="Expiration Date">
                                <div class="input-group-append">
                                    <button class="btn btn-primary pl-1 pr-1 add_field_button3" type="button">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="agreement" onclick="isChecked()">
                        <label class="custom-control-label" for="customCheck1">I agree to the <a href="#" class="text-danger" onclick="showAgreementTermsModal()">AGREEMENT TERMS</a></label>
                    </div>
                    <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success btn-xl pr-5 pl-5" disabled>Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="modal-title text-center text-danger" id="deleteModalLabel">AGREEMENT TERMS</h3>
                    <div class="modal-body">
                    

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac neque vitae felis elementum consequat. Praesent id dolor non felis facilisis efficitur eu et purus. Fusce porta quam massa, id lacinia risus posuere eget. Mauris eget vehicula nulla. Nulla ultrices elit vitae dui ornare, sed vehicula odio lacinia. Maecenas nec aliquam orci. Vivamus rhoncus justo eu pellentesque consequat. Cras a sem a mauris tempor pharetra ac rhoncus mi. Integer mi purus, pulvinar eget tempus vel, ultrices nec ex. Curabitur luctus diam ante, eget aliquam velit vestibulum a. Duis nunc eros, mattis ut felis non, sodales aliquam lorem. Nam aliquam finibus mauris pellentesque convallis. Aenean mollis lorem id nulla placerat, vitae semper orci egestas. Morbi finibus fringilla rhoncus.

Aenean ullamcorper, sem non ullamcorper cursus, elit nisi feugiat leo, vitae fringilla lacus arcu tristique eros. Nulla facilisi. Duis porttitor tellus sapien, et sodales sem pulvinar ut. Nulla tempus purus a bibendum egestas. In id massa fringilla, porttitor mauris in, rhoncus lacus. Nullam ultrices faucibus nunc non laoreet. Aenean ac ullamcorper est. Nullam scelerisque varius dui sed sollicitudin. Pellentesque lacus ligula, rhoncus non eleifend tincidunt, ullamcorper eu massa. Integer pharetra justo eget pellentesque scelerisque. Sed rhoncus finibus arcu, ut auctor leo auctor vel. Cras id varius nulla, quis hendrerit nisi. Nullam convallis malesuada nunc ac blandit. Proin rutrum, nunc at imperdiet suscipit, orci sapien ultrices orci, vel finibus quam neque et tortor.

Ut viverra venenatis lorem, et consectetur est imperdiet at. Cras efficitur fermentum mi in lobortis. Mauris sem ante, varius ac tellus in, sagittis vulputate nulla. Nunc vitae nulla ipsum. Nulla mauris enim, sollicitudin in nibh a, aliquet fringilla diam. Pellentesque sed feugiat sem, quis fermentum mauris. Nulla elementum risus a enim varius, eu ultricies massa tincidunt. Pellentesque eu enim varius, dignissim mi nec, congue dui. Vivamus sed sapien pulvinar, vulputate ante a, sollicitudin lorem. Curabitur a mi turpis. Mauris purus risus, ornare eget consequat sagittis, finibus in tortor. Vestibulum sed magna tempus, accumsan tortor a, tempus dolor. Vestibulum eget lorem erat. Mauris pretium libero est, in consectetur tortor pretium sed. Sed rhoncus tincidunt ante, vel facilisis leo dapibus et.

Cras suscipit eros nec augue porta auctor. Vestibulum turpis elit, vehicula porttitor efficitur ac, luctus et lacus. Quisque hendrerit quam at vulputate luctus. Suspendisse gravida imperdiet ipsum. Mauris imperdiet consectetur congue. Phasellus at vehicula sapien. Aenean sagittis dapibus metus a posuere. Phasellus laoreet mauris et odio ultricies, sed hendrerit enim pellentesque. Nullam fringilla quam id sapien mattis condimentum.

Pellentesque a risus ac metus volutpat semper. Mauris ornare sagittis magna vitae fermentum. In hac habitasse platea dictumst. Duis suscipit ante vel convallis ornare. Aenean sed dapibus velit. Aliquam pharetra ipsum risus, vel interdum lectus rutrum non. Vivamus tellus libero, congue dignissim molestie a, porttitor et neque. Aliquam placerat purus massa, tincidunt aliquam orci sodales vitae. Maecenas ac mauris tellus. Integer luctus ultrices eros, ut imperdiet velit. Mauris pretium elit quis nunc ullamcorper, ut eleifend lorem malesuada. Nullam rhoncus imperdiet ipsum vitae pretium. Ut ut consequat eros, et pulvinar odio. Nulla mi mi, dignissim ac sollicitudin fermentum, tincidunt vitae nisi. Cras efficitur massa vel dui porttitor lobortis. Sed laoreet nisi nec diam dapibus malesuada. 
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="refNoModal" tabindex="-1" role="dialog" aria-labelledby="refNoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                 <div class="text-center">
					<img src="{{ asset('images/GreenCheck.png') }}" style="width: 100px; text-align: center">
				</div>
                <h5 class="modal-title text-center" id="refNoModalLabel">YOUR REQUEST FOR ASSESSMENT IS NOW SEND TO THE SERVER</h5>
                <h3 class="text-center">REFERENCE NO.</h3>
                <h3 class="text-center border rounded border-dark text-danger text-monospace" id="ref_no">
                    @if (session()->has('ref_no'))
                        {{ session()->get('ref_no') }}
                    @endif
                </h3>
                <p class="text-center text-secondary">
                    NOTE: You have 24 hrs. to pay in any remittance center/bank said below. Don't forget to attach the receipt image and use the REFERENCE NO. for verification once you paid the amount
                </p>
                <h3 class="text-center text-secondary border rounded border-dark">
                    @if (session()->has('ref_no'))
                        P {{ session()->get('ref_no') }}
                    @endif
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
@endsection

@section('scripts')
<script>
    function isChecked()
    {
        if ($('input[name=agreement]').prop('checked')) {
            $('#btnSubmit').removeAttr("disabled");
        } else {
            $('#btnSubmit').attr("disabled", false);	
        }
    }

    function showAgreementTermsModal()
    {
        $("#deleteModal").modal('show');
    }
$(document).ready(function() {
    @if (session()->has('ref_no'))
        $("#refNoModal").modal('show');
    @endif
	var max_fields      = 3; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var wrapper1   		= $(".input_fields_wrap1"); //Fields wrapper
	var wrapper2   		= $(".input_fields_wrap2"); //Fields wrapper
	var wrapper3   		= $(".input_fields_wrap3"); //Fields wrapper

	var add_button       = $(".add_field_button"); //Add button ID
	var add_button1      = $(".add_field_button1"); //Add button ID
	var add_button2      = $(".add_field_button2"); //Add button ID
	var add_button3      = $(".add_field_button3"); //Add button ID
	
	var x = 1; //initlal text box count
	var x1 = 1; //initlal text box count
	var x2 = 1; //initlal text box count
	var x3 = 1; //initlal text box count
    
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(`<div class="input-group input_fields_wrap">
                                    <input type="text" name="we_nof[]" aria-label="Name of Company" class="form-control" placeholder="Name of Company">
                                    <input type="text" name="we_pos[]" aria-label="Position" class="form-control" placeholder="Position">
                                    <input type="date" name="we_from[]" aria-label="From" class="form-control" placeholder="From">
                                    <input type="date" name="we_to[]" aria-label="To" class="form-control" placeholder="To">
                                    <input type="number" name="we_month[]" aria-label="Monthly Salary" class="form-control" placeholder="Monthly Salary">
                                    <input type="text" name="we_soap[]" aria-label="Status of Appointment" class="form-control" placeholder="Status of Appointment">
                                    <input type="number" name="we_noye[]" aria-label="No. of Yrs. Exp." class="form-control" placeholder="No. of Yrs. Exp.">
                                    <div class="input-group-append">
                                        <button class="btn btn-danger pl-1 pr-1 remove_field" type="button">-</button>
                                    </div>
                                </div>`); //add input box
		}
	});

    $(add_button1).click(function(e) {
        e.preventDefault();
        if (x1 < max_fields) {
            x1++;
            $(wrapper1).append(`<div class="input-group input_fields_wrap1">
                                <input type="text" name="otsa_title[]" aria-label="First name" class="form-control" placeholder="Title">
                                <input type="text" name="otsa_venue[]" aria-label="Last name" class="form-control" placeholder="Venue">
                                <input type="date" name="otsa_from[]" aria-label="Last name" class="form-control" placeholder="From">
                                <input type="date" name="otsa_to[]" aria-label="Last name" class="form-control" placeholder="To">
                                <input type="number" name="otsa_hours[]" aria-label="Last name" class="form-control" placeholder="No. Of Hours">
                                <input type="text" name="otsa_conducted[]" aria-label="Last name" class="form-control" placeholder="Conducted By">
                                <div class="input-group-append">
                                    <button class="btn btn-danger pl-1 pr-1 remove_field" type="button">-</button>
                                </div>
                            </div>`);
        }
    });

    $(add_button2).click(function(e) {
        e.preventDefault();
        if (x2 < max_fields) {
            x2++;
            $(wrapper2).append(`<div class="input-group input_fields_wrap2">
                                <input type="text" name="le_title[]" aria-label="First name" class="form-control" placeholder="Title">
                                <input type="text" name="le_year[]" aria-label="Last name" class="form-control" placeholder="Year Taken">
                                <input type="date" name="le_date[]" aria-label="Last name" class="form-control" placeholder="Examination Venue">
                                <input type="number" name="le_rating[]" aria-label="Last name" class="form-control" placeholder="Rating">
                                <input type="number" name="le_remarks[]" aria-label="Last name" class="form-control" placeholder="Remarks">
                                <input type="date" name="le_expiry[]" aria-label="Last name" class="form-control" placeholder="Expiry Date">
                                <div class="input-group-append">
                                    <button class="btn btn-danger pl-1 pr-1 remove_field" type="button">-</button>
                                </div>
                            </div>`);
        }
    });

    $(add_button3).click(function(e) {
        e.preventDefault();
        if (x3 < max_fields) {
            x3++;
            $(wrapper3).append(`<div class="input-group input_fields_wrap3">
                                <input type="text" name="ca_title[]" aria-label="First name" class="form-control" placeholder="Title">
                                <input type="text" name="ca_ql[]" aria-label="Last name" class="form-control" placeholder="Qualification Level">
                                <input type="text" name="ca_is[]" aria-label="Last name" class="form-control" placeholder="Industry Sector">
                                <input type="text" name="ca_cn[]" aria-label="Last name" class="form-control" placeholder="Certificate Number">
                                <input type="date" name="ca_di[]" aria-label="Last name" class="form-control" placeholder="Date of Issuance">
                                <input type="date" name="ca_ed[]" aria-label="Last name" class="form-control" placeholder="Expiration Date">
                                <div class="input-group-append">
                                    <button class="btn btn-danger pl-1 pr-1 remove_field" type="button">-</button>
                                </div>
                            </div>`);
        }
    });
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).closest('.input-group').remove(); x--;
	});

    $(wrapper1).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).closest('.input-group').remove(); x1--;
	});

    $(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).closest('.input-group').remove(); x2--;
	});

    $(wrapper3).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).closest('.input-group').remove(); x3--;
	});
});
</script>
@endsection