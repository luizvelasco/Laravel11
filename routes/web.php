<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordControler;
use App\Http\Controllers\LoginControler;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// Rotas públicas
// Login
Route::get('/', [LoginControler::class, 'index'])->name('login.index');
Route::post('/login', [LoginControler::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginControler::class, 'destroy'])->name('login.destroy');
Route::get('/create-user-login', [LoginControler::class, 'create'])->name('login.create-user');
Route::post('/store-user-login', [LoginControler::class, 'store'])->name('login.store-user');

// Recuperar Senha
Route::get('/forgot-password', [ForgotPasswordControler::class, 'showForgotPassword'])->name('forgot-password-show');
Route::post('/forgot-password', [ForgotPasswordControler::class, 'submitForgotPassword'])->name('forgot-password-submit');

Route::get('/reset-password/{token}', [ForgotPasswordControler::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordControler::class, 'submitResetPassword'])->name('reset-password-submit');


// Rotas privadas
Route::group(['middleware' => 'auth'], function(){

    // Dashboard
    Route::get('/index-dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Perfil
    Route::get('/show-profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/edit-profile-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::put('/update-profile-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // Usuários
    Route::get('/index-user', [UserController::class, 'index'])->name('user.index');
    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/edit-user-password/{user}', [UserController::class, 'editPassword'])->name('user.edit-password');
    Route::put('/update-user-password/{user}', [UserController::class, 'updatePassword'])->name('user.update-password');
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    // Cursos
    Route::get('/index-course', [CourseController::class, 'index'])->name('course.index')->middleware('permission:index-course');
    Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('course.show')->middleware('permission:show-course');
    Route::get('/create-course', [CourseController::class, 'create'])->name('course.create')->middleware('permission:create-course');
    Route::post('/store-course', [CourseController::class, 'store'])->name('course.store')->middleware('permission:create-course');
    Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('course.edit')->middleware('permission:edit-course');
    Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('course.update')->middleware('permission:edit-course');
    Route::delete('/destroy-course/{course}', [CourseController::class, 'destroy'])->name('course.destroy')->middleware('permission:destroy-course');

    // Aulas
    Route::get('/index-classe/{course}', [ClasseController::class, 'index'])->name('classe.index')->middleware('permission:index-classe');
    Route::get('/show-classe/{classe}', [ClasseController::class, 'show'])->name('classe.show')->middleware('permission:show-classe');
    Route::get('/create-classe/{course}', [ClasseController::class, 'create'])->name('classe.create')->middleware('permission:create-classe');
    Route::post('/store-classe', [ClasseController::class, 'store'])->name('classe.store')->middleware('permission:create-classe');
    Route::get('/edit-classe/{classe}', [ClasseController::class, 'edit'])->name('classe.edit')->middleware('permission:edit-classe');
    Route::put('/update-classe/{classe}', [ClasseController::class, 'update'])->name('classe.update')->middleware('permission:edit-classe');
    Route::delete('/destroy-classe/{classe}', [ClasseController::class, 'destroy'])->name('classe.destroy')->middleware('permission:destroy-classe');

    // Papéis
    Route::get('/index-role', [RoleController::class, 'index'])->name('role.index')->middleware('permission:index-role');
    Route::get('/show-role/{role}', [RoleController::class, 'show'])->name('role.show');
    Route::get('/create-role', [RoleController::class, 'create'])->name('role.create');
    Route::get('/edit-role/{role}', [RoleController::class, 'edit'])->name('role.edit');
    Route::delete('/destroy-role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::post('/store-role', [RoleController::class, 'store'])->name('role.store');
    Route::put('/update-role/{role}', [RoleController::class, 'update'])->name('role.update');

});