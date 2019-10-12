<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVerificationRequest;
use App\Verification;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verification = Verification::orderBy('created_at', 'desc')
            ->orderBy('verified', 'asc')
            ->paginate(5);
        return view('verification.index')->withVerifications($verification);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.verification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVerificationRequest $request)
    {
        $image = $request->image->store('verification');
        Verification::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'tracking_number' => $request->tracking_number,
            'contact' => $request->contact,
            'image' => $image,
        ]);
        session()->flash('success', 'Category created successfully.');

        return redirect(route('verification.create'))->with('titleMessage', 'Your Request is Now On Process')->with('message', 'NOTE: Please wait 5-7 Days process for the update. You will receive an automated SMS once your appointment is done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function show(Verification $verification)
    {
        return view('verification.show')->withVerification($verification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verification $verification)
    {
        $verification->update([ 'verified' => 1]);

        session()->flash('success', 'Applicant successfully verified!');
        return redirect(route('verification.index'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        if ($q != "") {
            $verifications = Verification::where('fullname', 'LIKE', $q . '%')
                ->orWhere('tracking_number', 'LIKE', $q . '%')
                ->orderBy('created_at', 'desc')
                ->orderBy('verified', 'asc')
                ->paginate(5)->setPath('');
            $pagination = $verifications->appends(array(
                'q' => $request->q
            ));
            if (count($verifications) > 0)
                return view('verification.index')->withVerifications($verifications)->withQuery($q);
        }
        $verifications = Verification::orderBy('created_at', 'desc')->paginate(5);
        return view('verification.index')->withVerifications($verifications)->withMessage('No Details found. Try to search again !');
    }

}
