<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(DivisionController::class)->group(function () {
    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/division', 'index')->name('division.index');
        Route::get('/division/create', 'create')->name('division.create');
        Route::post('/division', 'store')->name('division.store');
        Route::get('/division/{division}/edit', 'edit')->name('division.edit');
        Route::put('/division/{division}', 'update')->name('division.update');
        Route::delete('/division/{division}', 'destroy')->name('division.destroy');
    });
});

Route::controller(EmployeeController::class)->group(function () {
    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/employee', 'index')->name('employee.index');
        Route::get('/employee/create', 'create')->name('employee.create');
        Route::post('/employee', 'store')->name('employee.store');
        Route::get('/employee/{employee}/edit', 'edit')->name('employee.edit');
        Route::put('/employee/{employee}', 'update')->name('employee.update');
        Route::delete('/employee/{employee}', 'destroy')->name('employee.destroy');
    });
});

Route::controller(ReportController::class)->group(function () {
    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/report', 'index')->name('report.index');
    });
});

Route::controller(AttendanceController::class)->group(function () {
    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/attendance', 'index')->name('attendance.index');
        Route::get('/attendance/create', 'create')->name('attendance.create');
        Route::post('/attendance', 'checkin')->name('attendance.checkin');
        Route::put('/attendance/{attendance}', 'checkout')->name('attendance.checkout');
    });
});

Route::controller(ScheduleController::class)->group(function () {
    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/schedule', 'index')->name('schedule.index');
        Route::get('/schedule/create', 'create')->name('schedule.create');
        Route::post('/schedule', 'store')->name('schedule.store');
        Route::get('/schedule/{schedule}/edit', 'edit')->name('schedule.edit');
        Route::put('/schedule/{schedule}', 'update')->name('schedule.update');
        Route::delete('/schedule/{schedule}', 'destroy')->name('schedule.destroy');
    });
});

Route::controller(PayrollController::class)->group(function () {
    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/payroll', 'index')->name('payroll.index');
        Route::get('/payroll/create', 'create')->name('payroll.create');
        Route::post('/payroll', 'store')->name('payroll.store');
        Route::get('/payroll/{payroll}/edit', 'edit')->name('payroll.edit');
        Route::put('/payroll/{payroll}', 'update')->name('payroll.update');
        Route::delete('/payroll/{payroll}', 'destroy')->name('payroll.destroy');
    });
});
