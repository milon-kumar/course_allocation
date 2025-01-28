<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Service\TeacherService;
use App\Models\Allocation;
use App\Models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public static $teacherService;
    public function __construct(TeacherService $teacherService)
    {
        self::$teacherService = $teacherService;
    }

    public function allocation(Request $request)
    {
        $subjects = Subject::query()->when($request->input('department'),function($query,$search){
            $query->where('department_id',$search);
        })->when($request->input('curriculum'),function($query,$search){
            $query->where('curriculum_id',$search);
        })->when($request->input('semester'),function($query,$search){
            $query->where('semester_id',$search);
        });

        $data = [
            'title' => 'Select Your Allocation Subject',
            'departments' => Department::all(),
            'subjects' => $subjects->get(),
        ];
        return view('backend.pages.teacher.allocation.index',$data);
    }

    public function addAllocatedSubject($id) {
        $allocatedIds = session()->get('allocated_subjects', []);
        if (in_array($id, $allocatedIds)) {
            $allocatedIds = array_diff($allocatedIds, [$id]);
        } else {
            $allocatedIds[] = $id;
        }
        session(['allocated_subjects' => $allocatedIds]);
        flash()->success('Allocation added');
        return redirect()->back();
    }

    public function getAllocatedSubjects(){
        $allocatedIds = session()->get('allocated_subjects', []);
        $subjects = Subject::with(['department','curriculum','semester'])->whereIn('id', $allocatedIds)->get();
        return response()->json($subjects);
    }

    public function clearAllocatedSubjects(){
        session()->forget('allocated_subjects');
        flash()->success('Selected Allocation Cleared');
        return back();
    }

    public function storeAllocatedSubjects(){
        $allocatedIds = session()->get('allocated_subjects', []);
        if(empty($allocatedIds)){
            flash()->warning('Selected Allocation Cleared');
            return back();
        }

        foreach($allocatedIds as $id){
            self::$teacherService::allocationUpdateOrCreate(null,$id);
        }
        session()->forget('allocated_subjects');
        flash()->success('Subject Allocated Successfully');
        return back();
    }

    public function allAllocatedSubjects(){
       $data = [
            'title' => "All Allocated Subjects",
            'allocationSubjects' => Allocation::with(['user','subject.department','subject.curriculum','subject.semester'])->where('user_id',auth()->id())->get(),
            'departments' => Department::all(),
        ];

        return view('backend.pages.teacher.allocation.all_allocated_subjects',$data);
    }
}
