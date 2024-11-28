@extends('layouts.login')

@section('content')
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Novo Usuário</h3>
            </div>
            <div class="card-body">

                <x-alert />

                <form action="{{ route('login.store-user') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="name" id="name"  placeholder="Digite o nome completo" value="{{ old('name') }}"/>
                        <label for="name">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="email" name="email" id="email"  placeholder="E-mail do usuário" value="{{ old('email') }}"/>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password"name="password" id="password"  placeholder="Senha" />
                        <label for="password">Senha</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="small">
                    <a href="{{ route('login.index') }}" class="text-decoration-none">Clique aqui <a> para acessar</a></a>
                </div>
            </div>
        </div>
    </div>

@endsection

