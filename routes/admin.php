<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\MedicController;
use App\Http\Controllers\Admin\RecepcionistaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;

//la ruta se simplifica por que se le llamara atravez del controlador
//proteger la ruta con middleware acceso pacientes 
Route::get('',[HomeController::class,'index'])->name('admin.home')->middleware(['can:ACCESO A PACIENTES']);
Route::resource('administrators', AdministratorController::class)->names('admin.administrators');
Route::resource('medics', MedicController::class)->names('admin.medics');
Route::resource('receptionists', RecepcionistaController::class)->names('admin.receptionists');
//nuevo codigo para roles   
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('permissions', PermissionController::class)->names('admin.permissions');
Route::resource('users', UserController::class)->names('admin.users');