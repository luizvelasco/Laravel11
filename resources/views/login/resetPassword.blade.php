@extends('layouts.login')

@section('content')
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Nova senha</h3>
            </div>
            <div class="card-body">

                <x-alert />

                <form action="{{ route('reset-password-submit') }}" method="POST">
                    @csrf
                    @method('POST')

                    <input type="hidden" name = "token" value="{{ $token }}">

                    <div class="form-floating mb-3">
                        <input class="form-control" name="email" id="email" type="email" placeholder="Seu e-mail cadastrado" value="{{ old('email') }}"/>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="password" id="password" type="password" placeholder="Nova Senha" />
                        <label for="password">Nova Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirmar a Nova Senha" />
                        <label for="password_confirmation">Confirmar a nova senha</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="this.innerText = 'Atualizando...'">Atualizar</button>
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

