<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\DetailPlanController;
use Symfony\Component\Routing\Route as RoutingRoute;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\ProfilePermissionController;

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

Route::prefix('admin')->group(function() {

    /**
     * Home dashboard
     */
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    /**
     * Rotas para perfis
     */
    Route::resource('/profiles', ProfileController::class);
    Route::any('/profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
    
    /**
     * Rotas para permissões
     */
    Route::resource('/permissions', PermissionController::class);
    Route::any('/permissions/search', [PermissionController::class, 'search'])->name('permissions.search');

    /**
     * Perfil x Permissão
     */
    Route::get('profiles/{id}/permissions', [ProfilePermissionController::class, 'permissions'])->name('profiles.permissions');

    /**
     * Rotas para planos
     */
    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plan/{url}', [PlanController::class, 'show'])->name('plan.show');
    Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/plan/{url}/edit', [PlanController::class, 'edit'])->name('plan.edit');
    Route::put('/plans/{url}', [PlanController::class, 'update'])->name('plan.update');
    Route::delete('/plan/{id}', [PlanController::class, 'destroy'])->name('plan.destroy');
    Route::any('/plans/search', [PlanController::class, 'search'])->name('plans.search');

    /**
     * Rotas para detalhes dos planos
     */
    Route::get('/plans/{url}/details', [DetailPlanController::class, 'index'])->name('plan.details.index');
    Route::get('/plan/{url}/details/{id}', [DetailPlanController::class, 'show'])->name('plan.details.show');
    Route::get('/plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('plan.details.create');
    Route::post('/plans/{url}/details/', [DetailPlanController::class, 'store'])->name('plan.details.store');
    Route::get('/plan/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('plan.details.edit');
    Route::put('/plan/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('plan.details.update');
    Route::delete('/plan/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('plan.details.destroy');
});
