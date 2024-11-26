@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Usuário</h2>

        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}" class="text-decoration-none">Usuários</a>
            </li>
            <li class="breadcrumb-item active">Usuário</li>
        </ol>
    </div>

    <div class="card mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Editar</span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('user.index') }}" class="btn btn-info btn-sm me-1 mb-1 mb-sm-0"><i class="fa-solid fa-list"></i> Listar</a>
                <a href="{{ route('user.show',['user' => $user->id]) }}" class="btn btn-primary btn-sm me-1 mb-1 mb-sm-0"><i class="fa-regular fa-eye"></i> Visualizar</a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />

            <form action="{{ route('user.update-password', ['user' => $user->id]) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name = "password" class="form-control" id="password"  placeholder="Senha com no mínimo 6 caracteres" >
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                  </div>
            </form>
            
        </div>
    </div>


</div>

@endsection
