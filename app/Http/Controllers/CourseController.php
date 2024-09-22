<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Listar os Cursos
    public function index(){
        // Carregar a View
        return view ('courses.index');
    }

    // Visualizar o Curso
    public function show(){
        // Carregar a View
        return view ('courses.show');
    }

    // Carregar o formulário cadastrar novo curso
    public function create(){
        // Carregar a View
        return view ('courses.create');
    }

    // Cadastrar no banco de dados o novo curso
    public function store(){
        dd('Cadastrar');
    }

    // Carrega o formulário editar curso
    public function edit(){
        // Carregar a View
        return view ('courses.edit');
    }

    // Editar no banco de dados o curso
    public function update(){
        dd('Editar');
    }

    // Excluir o curso no banco de dados
    public function destroy(){
        dd('Apagar');
    }

}
