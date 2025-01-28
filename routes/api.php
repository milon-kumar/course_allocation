<?php

    use App\Http\Controllers\Backend\DepartmentController;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/department', DepartmentController::class);
