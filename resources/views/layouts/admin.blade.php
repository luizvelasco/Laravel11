<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Celke</title>
</head>
<style>
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
</style>
<body>
    
    @yield('content')

</body>
</html>     