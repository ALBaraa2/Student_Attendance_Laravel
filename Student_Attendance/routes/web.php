<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachAssistantController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('courses',CourseController::class);
Route::resource('students', StudentController::class);
Route::resource('assistants', TeachAssistantController::class);
Route::resource('sections', SectionController::class);

