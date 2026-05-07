<?php

use App\Http\Controllers\permissioncontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;
use App\Models\register;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\user;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //Route::get('register', [registercontroller::class, 'register']);
    //Route::post('register', [registercontroller::class, 'register']);




    // Route::get('roles', [permissioncontroller::class, 'roles']);
    // Route::get('permissions', [permissioncontroller::class, 'permissions']);
    // Route::get('users', [permissioncontroller::class, 'users']);
    // Route::get('articales', [permissioncontroller::class, 'articales']);



    Route::get('create', [permissioncontroller::class, 'create'])->name('create');
    Route::post('store', [permissioncontroller::class, 'store'])->name('store');
    Route::get('list', [permissioncontroller::class, 'list'])->name('list');

    Route::get('edit/{id}', [permissioncontroller::class, 'edit'])->name('edit');
    Route::put('update/{id}', [permissioncontroller::class, 'update'])->name('update');

        Route::get('delete/{id}', [permissioncontroller::class, 'delete'])->name('delete');
});

require __DIR__ . '/auth.php';





   



    //  Route::get('admin', function () {
    //     $user = user::find(1);
    //     $user->assignRole('admin');
    //     return view('admin.dashboard');
    // });