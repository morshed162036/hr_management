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

use App\Http\Controllers\Leave\HolidaysController;
use App\Http\Controllers\Leave\LeaveController;
use App\Http\Controllers\Leave\LeaveApplicationController;
use App\Http\Controllers\Leave\LeaveApplicationOnlineController;
use App\Http\Controllers\Leave\LeaveApplicationApprovalController;

use App\Http\Controllers\Hr\PromotionController;
use App\Http\Controllers\Hr\IncrementController;
use App\Http\Controllers\Hr\LoanController;
use App\Http\Controllers\Hr\LoanApplicationController;
use App\Http\Controllers\Hr\AllowanceController;
use App\Http\Controllers\Hr\AllowanceListController;
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
        Route::resource('leave-holidays', HolidaysController::class);
        Route::get('leave-holidays-year', [HolidaysController::class,'year'])->name('leave-holidays.year');
        Route::resource('leave-type', LeaveController::class);
        Route::resource('leave-application', LeaveApplicationController::class);
        Route::resource('leave-application-online', LeaveApplicationOnlineController::class);
        Route::resource('leave-application-approval', LeaveApplicationApprovalController::class);

        Route::match(['get','post'],'promotion/{slug}', [PromotionController::class,'create'])->name('promotion.create');
        Route::match(['get','post'],'promotion-store/{slug}', [PromotionController::class,'store'])->name('promotion.store');
        Route::match(['get','post'],'promotion-history', [PromotionController::class,'promotion_history'])->name('promotion.history');
        Route::get('promotion-approval-list',[PromotionController::class,'index'])->name('promotion.index');
        Route::post('promotion-approval/{slug}/{id}',[PromotionController::class,'update'])->name('promotion-approval.update');

        Route::match(['get','post'],'increment/{slug}', [IncrementController::class,'create'])->name('increment.create');
        Route::match(['get','post'],'increment-store/{slug}', [IncrementController::class,'store'])->name('increment.store');
        Route::match(['get','post'],'increment-history', [IncrementController::class,'increment_history'])->name('increment.history');
        Route::get('increment-approval-list',[IncrementController::class,'index'])->name('increment.index');
        Route::post('increment-approval/{slug}/{id}',[IncrementController::class,'update'])->name('increment-approval.update');

        Route::resource('loan', LoanController::class);
        Route::post('update-loan-status',[LoanController::class,'updateLoanStatus'])->name('updateLoanStatus');
        Route::resource('loan-application', LoanApplicationController::class);
        Route::match(['get','post'],'loan-application-create', [LoanApplicationController::class,'create'])->name('loan-application.create');
        Route::get('loan-approval-list',[LoanApplicationController::class,'list'])->name('loan-approval.list');
        Route::post('loan-approval/{slug}/{id}',[LoanApplicationController::class,'update'])->name('loan-approval.update');

        Route::resource('allowance', AllowanceController::class);
        Route::post('update-allowance-status',[AllowanceController::class,'updateAllowanceStatus'])->name('updateAllowanceStatus');
        Route::resource('allowance-list', AllowanceListController::class);
    });
});


