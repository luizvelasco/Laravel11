<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClasseRequest;
use App\Models\Classe;
use App\Models\Course;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    // Listar as aulas
    public function index(Course $course){
        
        // Recuperar as aulas do banco de dados
        $classes = Classe::with('course')
            ->where('course_id', $course->id)
            ->orderBy('order_classe')
            ->get();

            // Carregar a view
            return view('classes.index', ['course' => $course, 'classes' => $classes]);
    }

    public function create(Course $course)
    {
        // Carregar a view
        return view ('classes.create', ['course' => $course, 'course_id' => $course->id]);
    }

    // Cadastrar o banco de dados a nova aula
    public function store(ClasseRequest $request)
    {

        // Validar o formulário
        $request->validated();

        // Recuperar a ultima ordem da aula do curso
        $lastOrderClasse = Classe::where('course_id', $request->course_id)
                ->orderBy('order_classe', 'DESC')
                ->first();

        // Cadastrar no banco de dados na tabela aulas
        Classe::create([
            'name' => $request->name,
            'description' => $request->description,
            'order_classe' => $lastOrderClasse ? $lastOrderClasse->order_classe + 1 : 1,
            'course_id' => $request->course_id
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('classe.index', ['course' => $request->course_id])->with('success', 'Aula cadastrada com sucesso');
    }
}
