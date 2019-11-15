<?php

namespace App\Http\Controllers;

use App\Assessor;
use App\Qualification;
use App\Http\Requests\AssessorRequest;
use Illuminate\Http\Request;

class AssessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aasessors = Assessor::orderBy('last_name', 'asc')->paginate(5);
        return view('assessor.index')->with('assessors', $aasessors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qualification = Qualification::orderBy('course', 'asc')->get();
        return view('assessor.create')->with('qualifications', $qualification);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssessorRequest $request)
    {
        Assessor::create($request->all());

        session()->flash('success', 'Assessor has been successfully added.');

        return redirect(route('assessor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assessor  $assessor
     * @return \Illuminate\Http\Response
     */
    public function show(Assessor $assessor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assessor  $assessor
     * @return \Illuminate\Http\Response
     */
    public function edit(Assessor $assessor)
    {
        $qualifications = Qualification::orderBy('course', 'asc')->get();
        return view('assessor.create')->with('assessor', $assessor)->withQualifications($qualifications);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assessor  $assessor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assessor $assessor)
    {
        $assessor->update($request->all());

        session()->flash('success', 'Assessor has been updated successfully.');

        return redirect(route('assessor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assessor  $assessor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assessor $assessor)
    {
        $assessor->delete();

        session()->flash('success', 'Assessor has been removed successfully.');

        return redirect(route('assessor.index'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        if ($q != "") {
            $assessors = Assessor::where('last_name', 'LIKE', $q . '%')
                ->orWhere('first_name', 'LIKE', $q . '%')
                ->orderBy('last_name', 'asc')
                ->paginate(5)->setPath('');
            $pagination = $assessors->appends(array(
                'q' => $request->q
            ));
            if (count($assessors) > 0)
                return view('assessor.index')->withAssessors($assessors)->withQuery($q);
        }
        $assessors = Assessor::orderBy('created_at', 'desc')->paginate(5);
        return view('assessor.index')->withAssessors($assessors)->withMessage('No Details found. Try to search again !');
    }
}
