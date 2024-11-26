<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // Listar os usuários
    public function index()
    {

        // Recuperar os registros do banco dados
        $users = User::orderBy('id', 'ASC')
            ->paginate(2);

        // Salvar log
        Log::info('Listar cursos.');

        // Carregar a VIEW
        return view('users.index', ['menu' => 'users', 'users' => $users]);
    }

   // Carregar o formulário cadastrar novo usuário
   public function create()
   {

       // Carregar a VIEW
       return view('users.create', ['menu' => 'users']);
   }

   // Cadastrar no banco de dados o novo usuário
   public function store(UserRequest $request)
   {

       // Validar o formulário
       $request->validated();

       // Marca o ponto inicial de uma transação
       DB::beginTransaction();

       try {

           // Cadastrar no banco de dados na tabela cursos os valores de todos os campos
           $user = User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => $request->password,
           ]);

           // Operação é concluída com êxito
           DB::commit();

           // Salvar log
           Log::info('Usuário cadastrado.', ['user_id' => $user->id]);

           // Redirecionar o usuário, enviar a mensagem de sucesso
           return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuário cadastrado com sucesso!');
       } catch (Exception $e) {

           // Operação não é concluída com êxito
           DB::rollBack();

           // Salvar log
           Log::notice('Usuário não cadastrado.', ['error' => $e->getMessage()]);

           // Redirecionar o usuário, enviar a mensagem de erro
           return back()->withInput()->with('error', 'Usuário não cadastrado!');
       }
   }

   // Visualizar o usuário
   public function show(User $user)
   {

       // Salvar log
       Log::info('Visualizar o usuário.', ['user_id' => $user->id]);

       // Carregar a VIEW
       return view('users.show', ['menu' => 'users', 'user' => $user]);
   }

    // Excluir o curso do banco de dados
    public function destroy(User $user)
    {

        try {

            // Excluir o registro do banco de dados
            $user->delete();

            // Salvar log
            Log::info('Usuário apagado.', ['user_id' => $user->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('user.index')->with('success', 'Usuário apagado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Usuário não apagado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('user.index')->with('error', 'Usuário não apagado!');
        }
    }

     // Editar no banco de dados o usuário
     public function update(UserRequest $request, User $user)
     {
 
         // Marca o ponto inicial de uma transação
         DB::beginTransaction();
 
         try {
 
             // Validar o formulário
             $request->validated();
 
             // Editar as informações do registro no banco de dados
             $user->update([
                'name' => $request->name,
                'email' => $request->email,
             ]);
 
             // Operação é concluída com êxito
             DB::commit();
 
             // Salvar log
             Log::info('Usuário editado.', ['user_id' => $user->id]);
 
             // Redirecionar o usuário, enviar a mensagem de sucesso
             return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuário editado com sucesso!');
         } catch (Exception $e) {
 
             // Operação não é concluída com êxito
             DB::rollBack();
 
             // Salvar log
             Log::notice('Usuário não editado.', ['error' => $e->getMessage()]);
 
             // Redirecionar o usuário, enviar a mensagem de erro
             return back()->withInput()->with('error', 'Usuário não editado!');
         }
     }

     // Editar no banco de dados a senha do usuário
    public function updatePassword(UserRequest $request, User $user)
    {

        // Validar o formulário
        $request->validate([
            'password' => 'required|min:6',
        ], [
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ]);

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // Editar as informações do registro no banco de dados
            $user->update([
                'password' => $request->password,
            ]);

            // Salvar log
            Log::info('Senha do usuário editada.', ['id' => $user->id]);

            // Operação é concluída com êxito
            DB::commit();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('user.show', ['user' => $request->user])->with('success', 'Senha do usuário editada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::info('Senha do usuário não editada.', ['error' => $e->getMessage()]);

            // Operação não é concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Senha do usuário não editada!');
        }
    }

     // Carregar o formulário editar usuário
    public function edit(User $user)
    {

        // Carregar a VIEW
        return view('users.edit', ['menu' => 'users', 'user' => $user]);
    }

    // Carregar o formulário editar usuário senha
    public function editPassword(User $user)
    {

        // Carregar a VIEW
        return view('users.editPassword', ['menu' => 'users', 'user' => $user]);
    }
}
