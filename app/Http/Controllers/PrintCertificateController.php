<?php

namespace App\Http\Controllers;

use App\PrintCertificateModel;
use App\Qualification;
use App\RequestCertificate;
use App\Student;
use Illuminate\Http\Request;

class PrintCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifications = Qualification::orderBy('sector', 'asc')->paginate(5);
        return view('print.setup')->with('qualifications', $qualifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function certificateStatus()
    {
        $students = RequestCertificate::orderBy('fullname', 'asc')->paginate(5);
        return view('print.student')->with('students', $students);
    }

    public function certificateStatusSearch(Request $request)
    {
        $q = $request->q;
        if ($q != "") {
            $students = RequestCertificate::where('fullname', 'LIKE', $q . '%')
                ->orWhere('reference_number', 'LIKE', $q . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(5)->setPath('');
            $pagination = $students->appends(array(
                'q' => $request->q
            ));
            if (count($students) > 0)
                return view('print.student')->withStudents($students)->withQuery($q);
        }
        $students = RequestCertificate::orderBy('fullname', 'asc')->paginate(5);
        return view('print.student')->with('students', $students);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrintCertificateModel  $printCertificateModel
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
        // return view('print.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrintCertificateModel  $printCertificateModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        return view('print.coc')->with('qualification', $qualification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrintCertificateModel  $printCertificateModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrintCertificateModel $printCertificateModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrintCertificateModel  $printCertificateModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrintCertificateModel $printCertificateModel)
    {
        //
    }

    public function addCocQualifications(Qualification $qualification)
    {
        $cocs = PrintCertificateModel::where('qualification_id', $qualification->id)->orderBy('code_no', 'asc')->paginate(5);
        return view('print.coc')->with('qualification', $qualification)->with('cocs', $cocs);
    }

    public function storeCocQualifications(Request $request)
    {
        $request->validate([
            'code_no' => 'required|min:3',
            'core_competencies' => 'required|min:3'
        ]);
        PrintCertificateModel::create([
            'code_no' => $request->code_no,
            'core_competencies' => $request->core_competencies,
            'qualification_id' => $request->qualification_id
        ]);
        session()->flash('success', 'COC has been added.');
        return back();
    }

    public function editCoc(PrintCertificateModel $print)
    {
        return view('print.cocEdit')->with('print', $print);
    }

    public function updateCoc(Request $request, PrintCertificateModel $print)
    {
        $request->validate([
            'code_no' => 'required|min:3',
            'core_competencies' => 'required|min:3'
        ]);
        $print->update($request->all());
        session()->flash('success', 'Coc has been successfully updated.');
        return redirect(route('add.coc', $print->qualification->id));
    }

    public function deleteCoc(PrintCertificateModel $print)
    {
        $print->delete();
        session()->flash('success', 'Coc has been deleted.');
        return back();
    }

    public function searchCoc(Request $request, Qualification $qualification)
    {
        $q = $request->q;
        if ($q != "") {
            $cocs = PrintCertificateModel::where('qualification_id', $qualification->id)
                ->where('code_no', 'LIKE', $q . '%')
                ->orWhere('core_competencies', 'LIKE', $q . '%')
                ->orderBy('code_no', 'asc')
                ->paginate(5)->setPath('');
            $pagination = $cocs->appends(array(
                'q' => $request->q
            ));
            if (count($cocs) > 0)
                return view('print.coc')->with('qualification', $qualification)->with('cocs', $cocs)->withQuery($q);
        }
        $cocs = PrintCertificateModel::where('qualification_id', $qualification->id)->orderBy('code_no', 'asc')->paginate(5);
        return view('print.coc')->with('qualification', $qualification)->with('cocs', $cocs);
    }
}
