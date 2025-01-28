<?php

namespace App\Http\Service;

use App\Models\Batch;
use Illuminate\Support\Facades\Auth;

class BatchService
{
    public function updateOrCreate($id = null, $request)
    {
        return Batch::updateOrCreate(['id' => $id], [
            'department_id' => $request->department_id,
            'curriculum_id' => $request->curriculum_id,
            'coordinator'=>$request->coordinator,
            'name' => $request->name,
            'number' => $request->number,
            'created_by' => $request->created_by
        ]);
    }
}
