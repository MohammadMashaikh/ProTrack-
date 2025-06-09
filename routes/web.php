<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjecsController;
use App\Http\Controllers\ProjectReportController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users Routes
    Route::controller(PersonnelController::class)->group(function () {
        Route::get('/users/index', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users/store', 'store')->name('users.store');
    });

      // Clients Routes
    Route::controller(ClientsController::class)->group(function () {
        Route::get('/clients/index', 'index')->name('clients.index');
        Route::get('/clients/create', 'create')->name('clients.create');
        Route::post('/clients/store', 'store')->name('clients.store');
    });

      // Projects Routes
    Route::controller(ProjecsController::class)->group(function () {
        Route::get('/projects/index', 'index')->name('projects.index');
        Route::get('/projects/create', 'create')->name('projects.create');
        Route::post('/projects/store', 'store')->name('projects.store');
    });

    // Tasks Routes
    Route::controller(TasksController::class)->group(function () {
        Route::get('/tasks/index', 'index')->name('tasks.index');
        Route::get('/tasks/create', 'create')->name('tasks.create');
        Route::post('/tasks/store', 'store')->name('tasks.store');
    });

});

Route::get('/report/projects', [ProjectReportController::class, 'generate'])->name('projects.report');


require __DIR__.'/auth.php';
