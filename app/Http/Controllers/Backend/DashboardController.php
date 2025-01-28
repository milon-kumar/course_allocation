<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application|string
    {
        $data = [
            'title' => 'Dashboard',
            'departments' => Department::count(),
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
}
