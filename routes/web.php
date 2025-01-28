<?php

use App\Http\Controllers\Backend\AllocationController;
use App\Http\Controllers\Backend\BatchController;
use App\Http\Controllers\Backend\CurriculumController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\SemesterController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect('/login');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->role == 'teacher') {
        return redirect()->route('teacher.dashboard');
    } else {
        return redirect()->back();
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('/department', DepartmentController::class);
    Route::resource('/curriculum', CurriculumController::class);
    Route::resource('/semester', SemesterController::class);

    Route::get('/subject/{semesterId}', [SubjectController::class, 'index'])->name('subjectManage');
    Route::get('/subject-create/{semesterId}', [SubjectController::class, 'create'])->name('subjectCreate');
    Route::post('/subject-store/{semesterId}', [SubjectController::class, 'store'])->name('subjectStore');
    Route::get('/subject-edit/{semesterId}/{id}', [SubjectController::class, 'edit'])->name('subjectEdit');
    Route::get('/subject-update/{semesterId}/{id}', [SubjectController::class, 'update'])->name('subjectUpdate');
    Route::get('/subject-delete/{semesterId}/{id}', [SubjectController::class, 'destroy'])->name('subjectDelete');

    Route::resource('/subject', SubjectController::class);
    Route::resource('/teacher', UserController::class);

    Route::resource('/batch', BatchController::class);

    Route::get('/allocation',[AllocationController::class,'requestedAllocation'])->name('requestedAllocation');
    Route::get('/approve-allocation-subject/{id}',[AllocationController::class,'approveAllocationSubject'])->name('approveAllocationSubject');
    Route::post('/draft-allocation-subject',[AllocationController::class,'draftAllocationSubject'])->name('draftAllocationSubject');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'teacher', 'as' => 'teacher.', 'middleware' => ['auth', 'teacher']], function () {
    Route::get('/dashboard', [DashboardController::class, 'teacherDashboard'])->name('dashboard');
    Route::get('/allocation',[TeacherController::class,'allocation'])->name('allocation');

    Route::get('/add-allocated-subject/{id}',[TeacherController::class,'addAllocatedSubject'])->name('addAllocatedSubject');
    Route::get('/allocated-subjects', [TeacherController::class, 'getAllocatedSubjects'])->name('allocatedSubjects');
    Route::get('/clear-allocated-subjects', [TeacherController::class, 'clearAllocatedSubjects'])->name('clearAllocatedSubjects');
    Route::get('store-allocated-subjects',[TeacherController::class, 'storeAllocatedSubjects'])->name('storeAllocatedSubjects');
    Route::get('/all-allocated-subjects',[TeacherController::class,'allAllocatedSubjects'])->name('allAllocatedSubjects');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/department/{department}/curriculums', [CurriculumController::class, 'getCurriculumsByDepartment']);
Route::get('/curriculum/{curriculum}/semesters', [CurriculumController::class, 'getSemesterByCurriculum']);

require __DIR__ . '/auth.php';
