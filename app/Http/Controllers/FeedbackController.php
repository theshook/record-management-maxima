<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\CreateFeedbackRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $feedbacks = Feedback::orderBy('created_at', 'desc')->paginate(5);
        return view('feedback.index')->withFeedbacks($feedbacks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFeedbackRequest $request)
    {
        Feedback::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return response()->json(['success' => 'Feedback is successfully added']);
        // session()->flash('success', 'Feedback successfully sent.');

        // return redirect(route('feedback.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        return view('feedback.show')->withFeedback($feedback);
    }

    public function search(Request $request)
    {
        $q = $request->q;
        if ($q != "") {
            $feedbacks = Feedback::where('fullname', 'LIKE', $q . '%')
                ->orWhere('email', 'LIKE', $q . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(5)->setPath('');
            $pagination = $feedbacks->appends(array(
                'q' => $request->q
            ));
            if (count($feedbacks) > 0)
                return view('feedback.index')->withFeedbacks($feedbacks)->withQuery($q);
        }
        $feedbacks = Feedback::orderBy('created_at', 'desc')->paginate(5);
        return view('feedback.index')->withFeedbacks($feedbacks)->withMessage('No Details found. Try to search again !');
    }
}
