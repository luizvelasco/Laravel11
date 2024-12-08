<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class LoginControler extends Controller
{
    // Login
    public function index() 
    {
        // Carregar a view
        return view ('login.index');
    }

    public function loginProcess(LoginRequest $request){
        // Validar o formulário
        $request->validated();

        // Validar o usuário e a senha com as informações do banco de dados
        $authenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if(!$authenticated) {

            // Redirecionar o usuário para a página anterior "login", enviar a mensagem de erro
            return back()->withInput()->with('error', 'E-mail ou senha inválido!');
        }

        // Obter o usuário autenticado
        $user = Auth::user();
        $user = User::find($user->id);

        // Verificar se a permissão é Super Admin, tem acesso a todas as páginas
        if($user->hasRole('Super Admin')){

            // O usuário tem acesso a todas as permissoes
            $permissions = Permission::pluck('name')->toArray();
        } else {

            // Recuperar no banco de dados as permissões que o papel possui
            $permissions = $user->getPermissionsViaRoles()->pluck('name')->toArray();
        }

        // Atribuir as permissões ao usuário  
        $user->syncPermissions($permissions);

        // Redirecionar o usuário
        return redirect()->route('dashboard.index');



    }

    public function destroy()
    {

        // Deslogar o usuário
        Auth::logout();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('login.index')->with('success', 'Deslogado com sucesso');

    }

    // Carregar o formulário cadastrar novo usuário
    public function create()
    {
        // Carregar a view
        return view ('login.create');
    }

    // Cadastrar no banco de dados o novo usuário
    public function store (LoginUserRequest $request)
    {
        // Validar o formulário
        $request->validated();

        // Marca o ponto inicial de uma transação
       DB::beginTransaction();

       try {

            // Cadastrar no banco de dados na tabela usuários os valores de todos os campos
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Cadatrar papel para o usuário
            $user->assignRole("Aluno");

            // Operação é concluída com êxito
            DB::commit();

            // Salvar log
            Log::info('Usuário cadastrado.', ['user_id' => $user->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('login.index')->with('success', 'Usuário cadastrado com sucesso!');
        
       } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Salvar log
            Log::notice('Usuário não cadastrado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Usuário não cadastrado!');
    }


    }
}
