<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Service\SubjectService;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public static $subjectService;
    public function __construct(SubjectService $subjectService)
    {
        self::$subjectService = $subjectService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $semester = Semester::findOrFail($id);

         $data = [
            'title' => 'Subject',
            'semesterId'  => $id,
            'subjects' => Subject::with(['semester'])->where('department_id',$semester->department_id)->where('curriculum_id',$semester->curriculum_id)->where('semester_id',$semester->id)->get(),
        ];
        return view('backend.pages.admin.subject.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = [
            'title' => 'Subject Create',
            'semesterId'  => $id
        ];
        return view('backend.pages.admin.subject.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request , $semesterId)
    {
        $semester = Semester::findOrFail($semesterId);

        $request['created_by'] = Auth::id();
        $request['department_id'] = $semester->department_id;
        $request['curriculum_id'] = $semester->curriculum_id;
        $request['semester_id'] = $semesterId;

        self::$subjectService::updateOrCreate(null,$request);
        flash()->success('Data Insert Successfully');
        return redirect()->route('admin.subjectManage',$semesterId);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        if($subject->delete()){
            confirmDelete('Data Delete Successfully','success');
            flash()->success('Data Delete Successfully');
            return back();
        }
    }
}
