<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use Illuminate\Http\Request;

class AllocationController extends Controller
{
    public function requestedAllocation()
    {
        $data = [
            'title' => "Requested Allocation",
            'allocations' => Allocation::with(['user.department', 'subject.department', 'subject.curriculum', 'subject.semester'])->get(),
        ];

        return view('backend.pages.admin.allocation.requested_allocation', $data);
    }

    public function approveAllocationSubject($id){
        $allocation = Allocation::findOrFail($id);
        $allocation->update([
            'status' => 'approved',
            'modify_by' => auth()->id(),
        ]);

        flash()->success('Course Allocated Done');
        return redirect()->back();
    }

    public function draftAllocationSubject(Request $request){
        $allocation = Allocation::findOrFail($request->subject_id);
        $allocation->update([
            'status' => 'draft',
            'modify_by' => auth()->id(),
            'action_nots' => $request->note
        ]);

        flash()->warning('Course Allocation In Draft');
        return redirect()->back();
    }
}
