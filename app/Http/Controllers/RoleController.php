<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // Listar os papeis
    public function index()
    {

        // Recuperar os registros do banco de dados
        $roles = Role::orderBy('name')->paginate(40);

        // Salvar Log
        Log::info('Listar papéris', ['action_user_id' => Auth::id()]);

        // Carregar a view
        return view ('roles.index', ['menu' => 'roles', 'roles' => $roles]);

    }
}
