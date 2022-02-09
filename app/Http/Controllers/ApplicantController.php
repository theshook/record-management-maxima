<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\competency_assessment;
use App\Http\Requests\ApplicantCreateRequest;
use App\licensure_exam;
use App\Qualification;
use App\training_seminar;
use App\WorkExperience;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::orderBy('last_name', 'asc')->paginate(5);
        return view('applicant.index')->withApplicants($applicants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qualification = Qualification::orderBy('course', 'asc')->get();
        return view('client.qualifications.apply')->with('qualification', $qualification);
    }

    public function searchApplicants(Request $request)
    {
        $q = $request->q;
        if ($q != "") {
            $applicants = Applicant::where('first_name', 'LIKE', $q . '%')
                ->orWhere('last_name', 'LIKE', $q . '%')
                ->orWhere('ref_no', 'LIKE', $q . '%')
                ->orderBy('last_name', 'desc')
                ->paginate(5)->setPath('');
            $pagination = $applicants->appends(array(
                'q' => $request->q
            ));
            if (count($applicants) > 0)
                return view('applicant.index')->withApplicants($applicants)->withQuery($q);
        }
        $applicants = Applicant::orderBy('last_name', 'asc')->paginate(5);
        return view('applicant.index')->withApplicants($applicants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantCreateRequest $request, Applicant $app)
    {
        $ref_no = $app->generateReferenceNumber();
        $applicant = Applicant::create([
            'training_center' => $request->training_center,
            'school_address' => $request->school_address,
            'qualification_id' => $request->title_assessment,
            'assessment_type' => $request->assessment_type,
            'client_type' => $request->client_type,

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'name_extension' => $request->name_extension,

            'street' => $request->street,
            'barangay' => $request->barangay,
            'district' => $request->district,
            'city' => $request->city,
            'province' => $request->province,
            'region' => $request->region,
            'zipcode' => $request->zipcode,

            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,

            'sex' => $request->sex,
            'civil_status' => $request->civil_status,

            'tel' => $request->tel,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'fax' => $request->fax,
            'others' => $request->others,

            'hea' => $request->hea,
            'es' => $request->es,

            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace,
            'age' => $request->age,

            'ref_no' => $ref_no
        ]);

        if ($request->we_nof[0] != null || $request->we_pos[0] != null || $request->we_from[0] != null || $request->we_to[0] != null || $request->we_month[0] != null || $request->we_soap[0] != null || $request->we_noye[0] != null) {
            foreach ($request->we_nof as $key => $we_nof) {
                $workExperience = new WorkExperience();
                $workExperience->we_nof = $we_nof;
                $workExperience->we_pos = $request->we_pos[$key];
                $workExperience->we_from = $request->we_from[$key];
                $workExperience->we_to = $request->we_to[$key];
                $workExperience->we_month = $request->we_month[$key];
                $workExperience->we_soap = $request->we_soap[$key];
                $workExperience->we_noye = $request->we_noye[$key];
                $workExperience->applicant_id = $applicant->id;
                $workExperience->save();
            }
        }

        if ($request->otsa_title[0] != null || $request->otsa_venue[0] != null || $request->we_from[0] != null || $request->we_to[0] != null || $request->otsa_hours[0] != null || $request->otsa_conducted[0] != null) {
            foreach ($request->otsa_title as $key => $otsa_title) {
                $trainingSeminar = new training_seminar();
                $trainingSeminar->otsa_title = $otsa_title;
                $trainingSeminar->otsa_venue = $request->otsa_venue[$key];
                $trainingSeminar->otsa_from = $request->otsa_from[$key];
                $trainingSeminar->otsa_to = $request->otsa_to[$key];
                $trainingSeminar->otsa_hours = $request->otsa_hours[$key];
                $trainingSeminar->otsa_conducted = $request->otsa_conducted[$key];
                $trainingSeminar->applicant_id = $applicant->id;
                $trainingSeminar->save();
            }
        }

        if ($request->le_title[0] != null || $request->le_year[0] != null || $request->le_date[0] != null || $request->le_rating[0] != null || $request->le_remarks[0] != null || $request->le_expiry[0] != null) {
            foreach ($request->le_title as $key => $le_title) {
                $licensureExam = new licensure_exam();
                $licensureExam->le_title = $le_title;
                $licensureExam->le_year = $request->le_year[$key];
                $licensureExam->le_date = $request->le_date[$key];
                $licensureExam->le_rating = $request->le_rating[$key];
                $licensureExam->le_remarks = $request->le_remarks[$key];
                $licensureExam->le_expiry = $request->le_expiry[$key];
                $licensureExam->applicant_id = $applicant->id;
                $licensureExam->save();
            }
        }

        if ($request->ca_title[0] != null || $request->ca_ql[0] != null || $request->ca_is[0] != null || $request->ca_cn[0] != null || $request->ca_di[0] != null || $request->ca_ed[0] != null) {
            foreach ($request->ca_title as $key => $ca_title) {
                $competencyAssessment = new competency_assessment();
                $competencyAssessment->ca_title = $ca_title;
                $competencyAssessment->ca_ql = $request->ca_ql[$key];
                $competencyAssessment->ca_is = $request->ca_is[$key];
                $competencyAssessment->ca_cn = $request->ca_cn[$key];
                $competencyAssessment->ca_di = $request->ca_di[$key];
                $competencyAssessment->ca_ed = $request->ca_ed[$key];
                $competencyAssessment->applicant_id = $applicant->id;
                $competencyAssessment->save();
            }
        }

        if ($request->assessment_type == 'FULL QUALIFICATION') {
            session()->flash('price', '1,500');
        } else if ($request->assessment_type == 'COC') {
            session()->flash('price', '500');
        } else if ($request->assessment_type == 'RENEWAL') {
            session()->flash('price', '900');
        }

        if (!empty($request->mobile)) {
            $message = 'Good day! This is from Maxima Technical And Skills Training Institute, Inc. We would like to inform you that you need to settle your payment within 24hrs, otherwise you\'ll be in our black list for 3 days. Your reference number is ' . $ref_no . ' Thank you!';
            $ch = curl_init();
            $parameters = array(
                'apikey' => 'YOUR_API_KEY', //Your API KEY
                'number' => $request->mobile,
                'message' => $message,
                'sendername' => ''
            );

            /*
            ##            FOR DISAPPROVED. TODO                                  
            */
            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);

            //Send the parameters set above with the request
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

            // Receive response from server
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
        }

        session()->flash('success', 'Application successfully sent!');
        session()->flash('ref_no', $ref_no);
        return redirect(route('applicants.create'))->with('ref_no', $ref_no);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        return view('applicant.show')->withApplicant($applicant);
    }

    public function printApplicants(Applicant $applicant)
    {
        return view('applicant.print')->withApplicant($applicant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
