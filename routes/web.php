<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;

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

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/plans', [PlanController::class, 'index'])->name('plans.index');
Route::get('/admin/plan/{url}', [PlanController::class, 'show'])->name('plan.show');
Route::get('/admin/plans/create', [PlanController::class, 'create'])->name('plans.create');
Route::post('/admin/plans', [PlanController::class, 'store'])->name('plans.store');
Route::delete('/admin/plan/{id}', [PlanController::class, 'destroy'])->name('plan.destroy');
Route::any('/admin/plans/search', [PlanController::class, 'search'])->name('plans.search');
