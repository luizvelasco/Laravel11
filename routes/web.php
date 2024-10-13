<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cursos
Route::get('/index-course', [CourseController::class, 'index'])->name('course.index'); // Listar os cursos
Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('course.show');  // Visualizar o Curso
Route::get('/create-course', [CourseController::class, 'create'])->name('course.create'); // Carregar o formulário cadastrar novo curso
Route::post('/store-course', [CourseController::class, 'store'])->name('course.store'); // Cadastrar no banco de dados o novo curso
Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('course.edit'); // Carrega o formulário editar curso
Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('course.update'); // Editar no banco de dados o curso
Route::delete('/destroy-course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');  // Excluir o curso no banco de dados

// Aulas
Route::get('/index-classe/{course}', [ClasseController::class, 'index'])->name('classe.index'); // Listar as aulas