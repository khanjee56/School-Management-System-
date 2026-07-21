<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', function() {
    if(auth()->check()) {
        return redirect('/redirect');
    }
    return redirect('/login');
});

Route::middleware('auth')->get('redirect', function(){
    if(auth()->user()->role=='teacher'){
        return redirect('/teacher/dashboard');
    }
    if(auth()->user()->role=='admin'){
        return redirect('/admin/dashboard');
    }
    if(auth()->user()->role=='student'){
        return redirect('/student/dashboard');
    }
    if(auth()->user()->role=='parent'){
        return redirect('/parent/dashboard');
    }
    return redirect('/login');
});

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/classes', [AdminController::class, 'classesindex']);
    Route::get('/classes/create', [AdminController::class, 'createclass']);
    Route::post('/classes/store', [AdminController::class, 'storeclass']);
    Route::get('/classes/{id}/edit', [AdminController::class, 'editclass']);
    Route::put('/classes/{id}/update', [AdminController::class, 'updateclass']);
    Route::delete('/classes/{id}/delete', [AdminController::class, 'destroyclass']);
    Route::get('/subjects', [AdminController::class,'subjectindex']);
    Route::get('/subjects/create', [AdminController::class,'subjectcreate']);
    Route::post('/subjects/store',[AdminController::class, 'subjectstore']);
    Route::get('/subjects/{id}/edit',[AdminController::class, 'subjectedit']);
    Route::put('/subjects/{id}/update',[AdminController::class, 'subjectupdate']);
    Route::delete('/subjects/{id}',[AdminController::class, 'subjectdelete']);
    Route::get('/teachers', [AdminController::class, 'teacherindex']);
    Route::get('/teachers/create', [AdminController::class, 'teachercreate']);
    Route::post('/teachers/store', [AdminController::class, 'teacherstore']);
    Route::get('/teachers/{id}/edit',[AdminController::class, 'teacheredit']);
    Route::put('/teachers/{id}/update', [AdminController::class, 'teacherupdate']);
    Route::delete('/teachers/{id}/delete', [AdminController::class, 'teacherdelete']);
    Route::get('/students', [AdminController::class, 'studentindex']);
    Route::get('/students/create', [AdminController::class, 'studentcreate']);
    Route::post('/students/store', [AdminController::class, 'studentstore']);
    Route::get('/students/{id}/edit', [AdminController::class, 'studentedit']);
    Route::put('/students/{id}/update', [AdminController::class, 'studentupdate']);
    Route::delete('/students/{id}/delete', [AdminController::class, 'studentdelete']);

});

Route::middleware(['auth','teacher'])->prefix('teacher')->group(function(){
    Route::get('/dashboard', [TeacherController::class, 'dashboard']);
});
Route::middleware(['auth','student'])->prefix('student')->group(function(){
    Route::get('/dashboard', [StudentController::class, 'dashboard']);
});
Route::middleware(['auth','parent'])->prefix('parent')->group(function(){
    Route::get('/dashboard', [ParentController::class, 'dashboard']);
});