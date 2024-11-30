@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <div class="mb-1 hstack gap-2">
        <h2 class="mt-3">Perfil</h2>

        <ol class="breadcrumb mb-3 mt-3 ms-auto">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Perfil</li>
        </ol>
    </div>

    <div class="card mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Editar</span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('profile.show') }}" class="btn btn-primary btn-sm me-1 mb-1 mb-sm-0"><i class="fa-regular fa-eye"></i> Visualizar</a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />

            <form class="row g-3" action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name = "name" class="form-control" id="name"  placeholder="Nome" value="{{ old('name', $user->name) }}" >
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name = "email" class="form-control" id="email"  placeholder="E-mail" value="{{ old('email', $user->email) }}" >
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                  </div>
            </form>
            
        </div>
    </div>


</div>

@endsection
