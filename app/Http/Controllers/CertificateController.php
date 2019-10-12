<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\RequestCertificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function print_certificate_index()
    {
        $students = RequestCertificate::orderBy('fullname', 'asc')->paginate(5);
        return view('certificate.print_certificate_index')->with('students', $students);
    }

    public function print_certificate_search(Request $request)
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
                return view('certificate.print_certificate_index')->withStudents($students)->withQuery($q);
        }
        $students = RequestCertificate::orderBy('fullname', 'asc')->paginate(5);
        return view('certificate.print_certificate_index')->with('students', $students);
    }

    public function showCertificate(RequestCertificate $requestCertificate)
    {
        return view('certificate.certificate_layout')->with('requestCertificate', $requestCertificate);
    }

    public function printCertificate(RequestCertificate $requestCertificate)
    {
        return view('certificate.print')->with('requestCertificate', $requestCertificate);
    }
}
