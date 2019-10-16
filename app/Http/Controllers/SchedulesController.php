<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Assessor;
use App\Applicant;
use App\StudentList;
use App\Qualification;
use DB;
use Yajra\Datatables\Datatables;
use Auth;


class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    public function scheduleAssessor(Qualification $qualification)
    {
        $qualification = Assessor::where('qualification_id', $qualification->id)->orderBy('last_name', 'asc')->get();
        return view('schedules.create')->with('assessors', $qualification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ass = Assessor::where('id', $request->assessor_id)->get();
        Schedule::create([
            'assessor_id' => $request->assessor_id,
            'assessment_schedule' => $request->assessment_schedule
        ]);

        session()->flash('success', 'Schedule for assessor has been created.');
        return redirect(route('qualifications.show', $ass[0]->qualification_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule, Assessor $assessor)
    {
        $app = new Applicant();
        $applicants = $app->getLists(0, $assessor->qualification_id);
        $students = $app->getLists(1, $assessor->qualification_id);
        if (Auth::user()) {
            return view('schedules.show')->withSchedule($schedule)->withAssessor($assessor)->withApplicants($applicants)->withStudents($students);
        } else {
            return view('client.qualifications.show_list')->withSchedule($schedule)->withAssessor($assessor)->withApplicants($applicants)->withStudents($students);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $date = date('F d, Y (l)', strtotime($schedule->assessment_schedule));
        $applicants = DB::table('student_lists')
            ->join('applicants', 'applicants.id', 'student_id')
            ->select('mobile')
            ->where('schedule_id', $schedule->id)
            ->pluck('mobile')
            ->toArray();

        if ($request->status == 'approved') {
            $message = 'Good day! This is from Maxima Technical And Skills Training Institute, Inc. We would glad to inform you that you are scheduled to take our assessment, this coming ' . $date . '. 8:00AM. This is an automated text message please do not reply Thank you!';
        } else if ($request->status == 'not yet approved') {
            $message = 'Good day! This is from Maxima Technical And Skills Training Institute, Inc. We would like to inform you that your schedule has resched please wait for update . This is an automated text message do not reply!';
        }

        $schedule->update([
            'status' => $request->status
        ]);

        $ch = curl_init();
        $parameters = array(
            'apikey' => '742afa72f86bb473bddb4aacc652190d', //Your API KEY
            'number' => implode(",", $applicants),
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

        session()->flash('success', 'Schedule successfully updated.');
        return redirect(route('qualifications.show', $schedule->assessor->qualification_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request, Schedule $schedule, Assessor $assessor)
    {
        $app = new Applicant();
        $students = $app->getLists(1, $assessor->qualification_id);
        $q = $request->q;
        if ($q != "") {
            $applicants = Applicant::where('qualification_id', $assessor->qualification->id)
                ->where(function ($query) use ($q) {
                    $query->where('last_name', 'LIKE', '%' . $q . '%')
                        ->orWhere('first_name', 'LIKE', '%' . $q . '%');
                })
                ->paginate(5)->setPath('');
            $pagination = $applicants->appends(array(
                'q' => $request->q
            ));
            if (count($applicants) > 0)
                return view('schedules.show')->withStudents($students)->withSchedule($schedule)->withAssessor($assessor)->withApplicants($applicants)->withQuery($q);
        }
        $applicants = Applicant::where('qualification_id', $assessor->qualification->id)
            ->where('scheduled', 0)
            ->orderBy('last_name', 'asc')
            ->paginate(5);
        return view('schedules.show')->withStudents($students)->withSchedule($schedule)->withAssessor($assessor)->withApplicants($applicants)->withMessage('No Details found. Try to search again !');
    }

    public function addStudents(Request $request)
    {
        $applicant = Applicant::find($request->student_id);
        StudentList::create($request->all());
        $applicant->update(['scheduled' => 1]);
        session()->flash('success', 'Student successfully added to schedule.');
        return back();
    }

    public function removeStudents(Applicant $applicant)
    {
        $studentList = StudentList::where('student_id', $applicant->id);
        $applicant->update(['scheduled' => 0]);
        $studentList->delete();
        session()->flash('success', 'Student successfully removed to schedule.');
        return back();
    }

    public function showStudents()
    {
        $applicants = Applicant::orderBy('last_name', 'asc')->paginate(5);
        return view('schedules.students')->withApplicants($applicants);
    }

    public function searchStudents(Request $request)
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
                return view('schedules.students')->withApplicants($applicants)->withQuery($q);
        }
        $applicants = Applicant::orderBy('last_name', 'asc')->paginate(5);
        return view('schedules.students')->withApplicants($applicants);
    }
}
