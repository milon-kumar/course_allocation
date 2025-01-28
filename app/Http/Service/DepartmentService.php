<?php

	namespace App\Http\Service;

	use App\Models\Department;
    use Illuminate\Support\Facades\Auth;

    class DepartmentService
	{
        public function updateOrCreate($id = null, $request)
        {
            return Department::updateOrCreate(['id' => $id],[
               'name' => $request->name ,
               'created_by' => 1,
            ]);
        }
	}
