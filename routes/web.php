<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Settings\WingController;
use App\Http\Controllers\Settings\BranchController;
use App\Http\Controllers\Settings\DepartmentController;
use App\Http\Controllers\Settings\SectionController;
use App\Http\Controllers\Settings\DesignationController;
use App\Http\Controllers\Settings\GradeController;
use App\Http\Controllers\Employee\EmployeeListController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::prefix('/')->group(function(){
    Route::match(['get','post'],'login',[AdminController::class,'login'])->name('login');
    Route::group(['middleware'=>['user']],function(){
        Route::get('logout',[AdminController::class,'logout'])->name('logout');
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::resource('wings', WingController::class);
        Route::post('update-wing-status',[WingController::class,'updateWingsStatus'])->name('updateWingsStatus');
        Route::resource('branch', BranchController::class);
        Route::resource('department', DepartmentController::class);
        Route::resource('section', SectionController::class);
        Route::resource('designation', DesignationController::class);
        Route::resource('grade', GradeController::class);

        Route::resource('employee-list', EmployeeListController::class);

    });
});


