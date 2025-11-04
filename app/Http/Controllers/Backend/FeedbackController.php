<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Teacher Feedback',
        ];

        $data['feedbacks'] = Feedback::select('id', 'teacher_id', 'subject_id', 'rating', 'review', 'created_at')->with([
            'teacher' => function ($query) {
                $query->select('id', 'name');
            },
            'subject' => function ($query) {
                $query->select('id', 'name');
            },
        ])
        ->paginate(19)
        ->withQueryString();

        return view('backend.pages.student.feedback.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Feedback',
        ];

        $data['teachers'] = User::select('id', 'name')->where('role', 'teacher')->get();
        $data['subjects'] = Subject::select('id', 'name')->get();

        return view('backend.pages.student.feedback.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request)
    {
        $data = $request->all();
        $data['student_id'] = Auth::user()->id;
        $feedback = new Feedback();
        $feedback->fill($data);
        $feedback->save();
        flash()->success('Data Insert Successfully');
        return redirect()->route('student.feedback.index');    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
