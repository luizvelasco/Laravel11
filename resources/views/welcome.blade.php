<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem-vindo - Laravel 11</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .welcome-section {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1920x1080') no-repeat center center/cover;
            color: white;
        }
        .welcome-section h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            padding: 0.75rem 1.5rem;
            font-size: 1.2rem;
            border-radius: 50px;
            text-transform: uppercase;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <section class="welcome-section">
        <h1>Bem-vindo ao Laravel 11</h1>
        <p>Comece sua jornada de aprendizado ou explore nossos cursos.</p>
        <a href="{{ route('courses.index') }}" class="btn btn-custom">Ver Cursos</a>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
