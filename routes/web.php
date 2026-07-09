<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
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