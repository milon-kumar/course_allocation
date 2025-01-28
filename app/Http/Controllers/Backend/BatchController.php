<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Http\Resources\BatchResource;
use App\Http\Service\BatchService;
use App\Models\Batch;
use App\Models\Curriculum;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BatchController extends Controller
{
    public static $batchService;
    public function __construct(BatchService $batchService)
    {
        self::$batchService = $batchService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Batch',
            'batches' => BatchResource::collection(Batch::with(['batchCoordinator','creator'])->simplePaginate(20)),
        ];
        return view('backend.pages.admin.batch.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'New Batch',
            'teachers' => User::where('role','teacher')->get(),
            "departments" => Department::all(),
        ];
        return view("backend.pages.admin.batch.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBatchRequest $request)
    {
        $request['created_by'] = Auth::id();
        self::$batchService->updateOrCreate(null,$request);
        flash()->success('Data Insert Successfully');
        return redirect()->route('admin.batch.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch)
    {
        $data = [
            'title' => 'Edit Batch',
            'teachers' => Teacher::all(),
            "curriculums" => Curriculum::all(),
        ];
        return view("backend.pages.admin.batch.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBatchRequest $request, Batch $batch)
    {
        $department = self::$batchService->updateOrCreate(null,$request);
        flash()->success('Data Update Successfully');
        return redirect()->route('admin.batch.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        //
    }
}
