<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cursos
Route::get('/index-course', [CourseController::class, 'index'])->name('courses.index'); // Listar os cursos
Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('courses.show');  // Visualizar o Curso
Route::get('/create-course', [CourseController::class, 'create'])->name('courses.create'); // Carregar o formulário cadastrar novo curso
Route::post('/store-course', [CourseController::class, 'store'])->name('courses.store'); // Cadastrar no banco de dados o novo curso
Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('courses.edit'); // Carrega o formulário editar curso
Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('courses.update'); // Editar no banco de dados o curso
Route::delete('/destroy-course/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');  // Excluir o curso no banco de dados