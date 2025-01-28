<?php
	namespace App\Http\Service;
    use App\Models\Subject;

    class SubjectService
	{
        public static function updateOrCreate($id = null, $request)
        {
            return Subject::updateOrCreate(['id' => $id],[
               'department_id' => $request->department_id ,
               'curriculum_id' => $request->curriculum_id ,
               'semester_id' => $request->semester_id ,
               'name' => $request->name ,
               'code' => $request->code ,
               'credit' => $request->credit ,
               'is_lab' => $request->filled('is_lab') ,
               'created_by' => auth()->id(),
            ]);
        }
	}
