<?php
	namespace App\Http\Service;
    use App\Models\Semester;

    class SemesterService
	{
        public static function updateOrCreate($id = null, $request)
        {
            return Semester::updateOrCreate(['id' => $id],[
               'department_id' => $request->department_id ,
               'curriculum_id' => $request->curriculum_id ,
               'name' => $request->name ,
               'created_by' => auth()->id(),
            ]);
        }
	}
