<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Celke</title>
</head>
<style>
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



</style>
<body>
    
    @yield('content')

</body>
</html>     