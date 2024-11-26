@extends('layouts.login')

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">

        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Área Restrita</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="email" id="email" type="email" placeholder="E-mail do usuário" />
                                        <label for="email">E-mail</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="password" id="password" type="password" placeholder="Senha" />
                                        <label for="password">Senha</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small text-decoration-none" href="#">Esqueceu a senha?</a>
                                        <button type="submit" class="btn btn-primary">Acessar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small">
                                    Precisa de uma conta?<a href="#" class="text-decoration-none">Inscrever-se</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
</div>
@endsection

