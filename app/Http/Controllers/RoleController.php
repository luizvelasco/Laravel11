<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // Listar os papeis
    public function index()
    {

        // Recuperar os registros do banco de dados
        $roles = Role::orderBy('name')->paginate(40);

        // Carregar a view
        return view ('roles.index', ['menu' => 'roles', 'roles' => $roles]);

    }

    // Visualizar o papel
    public function show(Role $role)
    {

        // Salvar log
        Log::info('Visualizar o papél.', ['role_id' => $role->id]);

        // Carregar a VIEW
        return view('roles.show', ['menu' => 'roles', 'role' => $role]);
    }

    // Carregar o formulário cadastrar novo papel
    public function create()
    {
        // Carregar a VIEW
        return view('roles.create', ['menu' => 'roles']);
    }

    // Cadastrar no banco de dados o novo papel
    public function store(RoleRequest $request)
    {

        // Validar o formulário
        $request->validated();

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // Cadastrar no banco de dados na tabela cursos os valores de todos os campos
            $role = Role::create([
                'name' => $request->name,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Salvar log
            Log::info('Papel cadastrado.', ['role_id' => $role->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('role.show', ['role' => $role->id])->with('success', 'Papel cadastrado com sucesso!');
        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Salvar log
            Log::notice('Papel não cadastrado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Papel não cadastrado!');
        }
    }

    // Carregar o formulário editar papel
    public function edit(Role $role)
    {
        // Carregar a VIEW
        return view('roles.edit', ['menu' => 'roles', 'role' => $role]);
    }

    // Editar no banco de dados o papel
    public function update(RoleRequest $request, Role $role)
    {

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // Validar o formulário
            $request->validated();

            // Editar as informações do registro no banco de dados
            $role->update([
               'name' => $request->name,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Salvar log
            Log::info('Papel editado.', ['role_id' => $role->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('role.show', ['role' => $role->id])->with('success', 'Papel editado com sucesso!');
        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Salvar log
            Log::notice('Papel não editado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Papel não editado!');
        }
    }
}
