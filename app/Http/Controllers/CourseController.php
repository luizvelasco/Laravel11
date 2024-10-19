<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Listar os Cursos
    public function index(){

        // Recuperar os registros do banco de dados
        //$courses = Course::where('id', 1000)->get(); //Lista com condição
        //$courses = Course::paginate(5); // Listar com paginação
        //$courses = Course::orderBy('name', 'DESC')->get(); // Listar todos com ordenação
        $courses = Course::get(); // Listar todos

        // Carregar a View
        return view ('courses.index', ['courses' => $courses]);
    }

    // Visualizar o Curso
    public function show(Course $course){

        //$course = Course::where('id', $request->course)->first(); //Recuperar com condição

        // Carregar a View
        return view ('courses.show', ['course' => $course]);
    }

    // Carregar o formulário cadastrar novo curso
    public function create(){
        // Carregar a View
        return view ('courses.create');
    }

    // Cadastrar no banco de dados o novo curso
    public function store(CourseRequest $request){

        //Validar o formulário
        $request->validated();

        // Cadastrar no banco de dados na tabela cursos os valores de todos os campos
        $course = Course::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        // Redirecionar o usuário, enviar mensagem de sucesso
        return redirect()->route('course.show', ['course' => $course->id])->with('success', 'Curso cadastrado com sucesso');
    }

    // Carrega o formulário editar curso
    public function edit(Course $course){
        
        // Carregar a View
        return view ('courses.edit', ['course' => $course]);
    }

    // Editar no banco de dados o curso
    public function update(CourseRequest $request, Course $course){

        //Validar o formulário
        $request->validated();

        // Editar as informações do registro no banco de dados
        $course->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        // Redirecionar
        return redirect()->route('course.show', ['course' => $course->id])->with('success', 'Curso editado com sucesso');
    }

    // Excluir o curso no banco de dados
    public function destroy(Course $course){
        
        //Excluir o registro no banco de dados
        $course->delete();

        //Redirecionar
        return redirect()->route('course.index')->with('success', 'Curso excluído com sucesso!');
    }

}
