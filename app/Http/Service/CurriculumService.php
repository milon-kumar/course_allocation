<?php

	namespace App\Http\Service;

	use App\Models\Curriculum;
    use Illuminate\Support\Facades\Auth;

    class CurriculumService
	{
        public static function updateOrCreate($id = null, $request)
        {
            return Curriculum::updateOrCreate(['id' => $id],[
               'department_id' => $request->department_id,
               'name' => $request->name ,
               'created_by' => auth()->id(),
            ]);
        }
	}
