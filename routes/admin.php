<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\MedicController;
use App\Http\Controllers\Admin\RecepcionistaController;


//la ruta se simplifica por que se le llamara atravez del controlador
Route::get('',[HomeController::class,'index'])->name('admin.home');
Route::resource('administrators', AdministratorController::class)->names('admin.administrators');
Route::resource('medics', MedicController::class)->names('admin.medics');
Route::resource('receptionists', RecepcionistaController::class)->names('admin.receptionists');