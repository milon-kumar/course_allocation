<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\Department;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'departments' => Department::count(),
            'teachers' => User::where('role', 'teacher')->count(),
            'allocation' => Allocation::selectRaw('COALESCE(SUM(status = "pending"), 0) as requested_count, COALESCE(SUM(status = "approved") , 0) as approved_count')->first()
        ];

        return view('backend.pages.admin.dashboard.dashboard', $data);
    }

    public function teacherDashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application|string
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('backend.pages.teacher.dashboard.dashboard', $data);
    }

    public function studentDashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application|string
    {
        $data = [
            'title' => 'Dashboard',
            'student' => Auth::user()
        ];
        return view('backend.pages.student.dashboard.dashboard', $data);
    }
}
