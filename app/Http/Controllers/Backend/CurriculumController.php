<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Http\Service\CurriculumService;
use App\Models\Curriculum;
use App\Models\Department;
use App\Models\Semester;

class CurriculumController extends Controller
{
    public static $curriculumService;
    public function __construct(CurriculumService $curriculumService)
    {
        self::$curriculumService = $curriculumService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Curriculum',
            'curriculums' =>Curriculum::with(['department'])->orderBy('id','DESC')->simplePaginate(20)
        ];
        return view('backend.pages.admin.curriculum.index',$data);
    }

    /**
     * Get curriculums by department.
     */
    public function getCurriculumsByDepartment($department){
        return Curriculum::where('department_id',$department)->get();
    }

      /**
     * Get semester by curriculum.
     */
    public function getSemesterByCurriculum($curriculum){
        return Semester::where('curriculum_id',$curriculum)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     $data = [
            'title' => 'Curriculum',
            'departments' => Department::all(),
        ];
        return view('backend.pages.admin.curriculum.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCurriculumRequest $request)
    {
        self::$curriculumService::updateOrCreate(null,$request);
        flash()->success('Data Insert Successfully');
        return redirect()->route('admin.curriculum.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculum $curriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curriculum $curriculum)
    {
        $data = [
            'title' => 'Update Curriculum',
            'departments' => Department::all(),
            'curriculum' => $curriculum,
        ];
        return view('backend.pages.admin.curriculum.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurriculumRequest $request, Curriculum $curriculum)
    {
        self::$curriculumService::updateOrCreate($curriculum->id,$request);
        flash()->success('Data Update Successfully');
        return redirect()->route('admin.curriculum.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculum $curriculum)
    {
        if($curriculum->delete()){
            confirmDelete('Data Delete Successfully','success');
            flash()->success('Data Delete Successfully');
            return back();
        }
    }
}
