<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Http\Service\DepartmentService;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public static $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        self::$departmentService = $departmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Department',
            'departments' => DepartmentResource::collection(Department::orderBy('id','DESC')->simplePaginate(20)),
        ];
        return view('backend.pages.admin.department.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'New Department',
        ];
        return view("backend.pages.admin.department.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $request['crated_by'] = Auth::id();
        self::$departmentService->updateOrCreate(null,$request);
        flash()->success('Data Insert Successfully');
        return redirect()->route('admin.department.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $data = [
            'title' => 'Update Department',
            'department' => $department,
        ];
        return view("backend.pages.admin.department.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $request['crated_by'] = Auth::id();

        $department = self::$departmentService->updateOrCreate($department->id,$request);
        flash()->success('Data Update Successfully');
        return redirect()->route('admin.department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        flash()->success('Data Delete Successfully');
        return redirect()->route('admin.department.index');
    }
}
