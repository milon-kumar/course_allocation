<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Http\Service\SemesterService;
use App\Models\Curriculum;
use App\Models\Department;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public static $semesterService;
    public function __construct(SemesterService $semesterService)
    {
        self::$semesterService = $semesterService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $semesters = Semester::query()->when($request->input('department'),function($query,$search){
            $query->where('department_id',$search);
        })->when($request->input('curriculum'),function($query,$search){
            $query->where('curriculum_id',$search);
        });

        $data = [
            'title' => 'Semester',
            'departments' => Department::all(),
            'semesters' =>$semesters->with(['department','curriculum'])->get(),
        ];
        return view('backend.pages.admin.semester.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Semester Create',
            'departments' => Department::all(),
        ];
        return view('backend.pages.admin.semester.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSemesterRequest $request)
    {
        self::$semesterService::updateOrCreate(null,$request);
        flash()->success('Data Insert Successfully');
        return redirect()->route('admin.semester.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        $data = [
            'title' => 'Semester',
            'semesters' =>Semester::all()
        ];
        return view('backend.pages.admin.subject.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        $data = [
            'title' => 'Semester Update',
            'departments' => Department::all(),
            'semester' => $semester->load('curriculum')
        ];
        return view('backend.pages.admin.semester.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        self::$semesterService::updateOrCreate($semester->id,$request);
        flash()->success('Data Update Successfully');
        return redirect()->route('admin.semester.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        if($semester->delete()){
            flash()->success('Data Delete Successfully');
            return back();
        }
    }
}
