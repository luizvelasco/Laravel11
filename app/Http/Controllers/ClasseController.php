<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClasseRequest;
use App\Models\Classe;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

         try {

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

            // Operação é concluída com êxito
            DB::commit();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('classe.index', ['course' => $request->course_id])->with('success', 'Aula cadastrada com sucesso');
        } catch (Exception $e) {
            
            // Operação não é concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Aula não cadastrada!');
        }
    }

    //Carregar o formulário editar aula
    public function edit(Classe $classe)
    {
        // Carregar a view
        return view('classes.edit', ['classe' => $classe]);
    }

    // Editar no banco de dados a aula
    public function update(ClasseRequest $request, Classe $classe)
    {
        // Validar o formulário
        $request->validated();

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // Editar as informações do registro no banco de dados
            $classe->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

             // Operação é concluída com êxito
             DB::commit();

            // Redirecionar o usuário
            return redirect()->route('classe.index', ['course' => $classe->course_id ])->with('success', 'Aula editada com sucesso!');
        } catch (Exception $e) {
            
            // Operação não é concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Aula não editada!');
        }
    }

    // Visualizar a aula
    public function show(Classe $classe){

        // Carregar a View
        return view ('classes.show', ['classe' => $classe]);
    }

    // Apagar a aula
    public function destroy(Classe $classe)
    {

        try {
            // Excluir o registro do banco de dados
            $classe->delete();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('classe.index', ['course' => $classe->course_id])->with('success', 'Aula excluído com sucesso!');
        } catch (Exception $e) {

            // Redirecionar o usuário, enviar a mensagem de erro
            return redirect()->route('classe.index', ['course' => $classe->course_id])->with('erro', 'Aula não exluída!');
        }
        
    }

}
