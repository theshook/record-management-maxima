<?php

namespace App\Http\Controllers;

use App\Assessor;
use Auth;
use App\Qualification;
use Illuminate\Http\Request;
use App\Http\Requests\QualificationRequest;
use Yajra\Datatables\Datatables;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualification = Qualification::orderBy('sector', 'asc')->paginate(5);
        if (Auth::user()) {
            return view('qualifications.index');
        } else {

            return view('client.qualifications.index')->withQualifications($qualification);
        }
    }

    public function getQualifications()
    {
        $qualification = Qualification::select(['id', 'sector', 'course', 'accreditation']);
        return Datatables::of($qualification)
            ->addColumn('action', function ($qualification) {
                return '<a href="' . route('qualifications.show', $qualification->id) . '" class="btn btn-primary btn-sm mr-2">Schedule</a>
                <a href="' . route('qualifications.show', $qualification->id) . '" class="btn btn-success btn-sm">Edit</a>';
            })
            ->make(true);
    }

    public function courseRegistered()
    {
        $qualification = Qualification::orderBy('sector', 'asc')->get();
        return view('client.course.course_registered')->withQualifications($qualification);
    }

    public function showCourses(Qualification $qualification)
    {
        return view('client.course.show')->withQualification($qualification);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qualifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QualificationRequest $request)
    {
        $data = $request->only(['sector', 'course', 'accreditation', 'description']);
        Qualification::create($data);

        session()->flash('success', 'Qualification Create Successfully.');

        return redirect(route('qualifications.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
        if (Auth::user()) {
            return view('qualifications.show')->with('qualification', $qualification);
        } else {
            return view('client.qualifications.show')->with('qualification', $qualification);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        return view('qualifications.create')->withQualification($qualification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(QualificationRequest $request, Qualification $qualification)
    {
        $data = $request->only(['sector', 'course', 'accreditation', 'description']);
        $qualification->update($data);

        session()->flash('success', 'Qualification Updated Successfully.');

        return redirect(route('qualifications.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification)
    {
        //
    }
}
