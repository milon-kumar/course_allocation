<?php
	namespace App\Http\Service;

use App\Models\Allocation;
use App\Models\Teacher;
use App\Models\User;

    class TeacherService
	{
        public static function updateOrCreate($id = null, $request)
        {
            return User::updateOrCreate(['id' => $id],[
               'department_id' => $request->department_id ,
               'name' => $request->name ,
               'role' => 'teacher',
               'image' => null ,
               'phone' => $request->phone ,
               'email' => trim($request->email) ,
               'priority' => $request->priority,
               'position' => $request->position,
               'created_by' => auth()->id(),
            ]);
        }

        public static function allocationUpdateOrCreate($id = null, $subjectId){
            Allocation::updateOrCreate(['id'=>$id],[
                'user_id' => auth()->id(),
                'subject_id' => $subjectId,
                'status' => 'pending',
            ]);
        }
	}
