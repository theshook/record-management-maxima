<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequestCeritificateRequest;
use App\Qualification;
use App\RequestCertificate;
use Illuminate\Http\Request;

class RequestCertificateController extends Controller
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
    {
        $qualifications = Qualification::orderBy('course', 'asc')->get();
        return view('client.request.create')->withQualifications($qualifications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequestCeritificateRequest $request, RequestCertificate $requestCertificate)
    {
        $rc = RequestCertificate::create([
            'fullname' => $request->fullname,
            'qualification_id' => $request->qualification,
            'address' => $request->address,
            'contactno' => $request->contactno,
            'deliveryType' => $request->deliveryType,
            'deliveryAddress' => $request->deliveryAddress,
            'reference_number' => $requestCertificate->generateReferenceNumber()
        ]);

        return response()->json([
            'success' => 'Certificate Request Successfully Sent!',
            'ref_no' => $rc->reference_number
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestCertificate  $requestCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(RequestCertificate $requestCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestCertificate  $requestCertificate
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestCertificate $requestCertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestCertificate  $requestCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestCertificate $requestCertificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestCertificate  $requestCertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestCertificate $requestCertificate)
    {
        //
    }
}
