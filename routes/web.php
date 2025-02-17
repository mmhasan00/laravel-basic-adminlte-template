<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::resource('permissions', App\Http\Controllers\PermissionController::class)->name('permissions', 'permission');
    Route::resource('roles', App\Http\Controllers\RoleController::class)->name('roles', 'role');
    Route::get('roles/addpermission/{roleid}', [App\Http\Controllers\RoleController::class,'addpermission'])->name('roles.addpermission');
    Route::put('roles/givepermission/{roleid}', [App\Http\Controllers\RoleController::class,'givepermission'])->name('roles.givepermission');


    Route::resource('users', App\Http\Controllers\UserController::class)->name('users', 'user');

});

require __DIR__.'/auth.php';




Route::get('/', function () {
    return view('frontend.apply');
});

