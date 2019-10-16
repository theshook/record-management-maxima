<?php

namespace App\Http\Controllers;

use App\Qualification;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('last_name', 'asc')->paginate(5);
        return view('student.index')->withStudents($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qualifications = Qualification::orderBy('course', 'asc')->get();
        return view('student.create')->with('qualifications', $qualifications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Student::create($request->all());

        session()->flash('success', 'Student successfully added.');
        return redirect(route('student.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $qualifications = Qualification::orderBy('course', 'asc')->get();
        return view('student.edit')->with('student', $student)->with('qualifications', $qualifications);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        session()->flash('success', 'Student has been updated successfully.');

        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        session()->flash('success', 'Student has been removed successfully.');

        return redirect(route('student.index'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        if ($q != "") {
            $students = Student::where('last_name', 'LIKE', $q . '%')
                ->orWhere('email', 'LIKE', $q . '%')
                ->orderBy('last_name', 'desc')
                ->paginate(5)->setPath('');
            $pagination = $students->appends(array(
                'q' => $request->q
            ));
            if (count($students) > 0)
                return view('student.index')->withStudents($students)->withQuery($q);
        }
        $students = Student::orderBy('last_name', 'asc')->paginate(5);
        return view('student.index')->withStudents($students);
    }
}
