<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles_sbadmin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <title>Celke</title>
</head>
{{-- <style>
    body {
            background-color: #f8f9fa;
        }
    form {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-size: 24px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #333;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
    }

    button:hover {
        background-color: #45a049;
    }

    .link-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        margin-bottom: 20px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .link-button:hover {
        background-color: #0056b3;
    }

    .success-message {
        color: #082;
        font-size: 16px;
        margin-bottom: 20px;
        text-align: center;
    }

    .course-list {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .course-item {
        margin-bottom: 20px;
        padding: 15px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .course-item h3 {
        margin: 0;
        font-size: 18px;
        color: #333;
    }

    .course-item p {
        margin: 5px 0;
        color: #555;
        font-size: 14px;
    }

    .course-item hr {
        border: none;
        border-top: 1px solid #eee;
        margin: 10px 0;
    }

    .empty-message {
        text-align: center;
        color: #f00;
        font-size: 16px;
        font-weight: bold;
    }
    .button-group a,
.button-group form {
    display: inline-block; /* Garante que os links e o formulário fiquem na mesma linha */
    margin-right: 10px; /* Espaçamento entre os botões */
}

.inline-form {
    display: inline-block; /* O formulário deve ser inline para o botão ficar ao lado dos links */
}

.delete-button {
    background-color: #f44336; /* Cor vermelha para o botão de apagar */
}

.delete-button:hover {
    background-color: #d32f2f; /* Cor mais escura ao passar o mouse */
}
button.link-button {
    background-color: #007BFF; /* Mesma cor de fundo dos outros botões */
    color: white;
    border: none; /* Remove a borda */
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}



</style> --}}
<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Celke</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Perfil</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#!">Sair</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                       
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                            Cursos
                        </a>

                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                            Sair
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logado: Luiz</div>
                   
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Celke {{ date('Y') }}</div>
                        <div>
                            <a href="#">Política de Privacidade</a>
                            &middot;
                            <a href="#">Termos de Uso</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts_sbadmin.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>

    {{-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> --}}

</body>
</html>     