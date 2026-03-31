<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/Views/css/style.css">
    <style>
        body {
            margin: 0;
            padding-top: 60px; /* Mantém o espaço para o header que continua fixo no topo */
            font-family: Arial, sans-serif;
            display: flex; 
            flex-direction: column;
            min-height: 100vh; /* Garante que a página ocupe toda a altura da tela */
        }
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px; 
            background-color: #333;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box; 
            z-index: 1000; 
        }
        .nav-buttons button {
            margin-left: 10px;
            padding: 8px 15px;
            cursor: pointer;
            background-color: #555;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .nav-buttons button:hover {
            background-color: #777;
        }
        main {
            flex: 1; /* Isso faz com que o conteúdo principal cresça e empurre o footer para baixo */
            padding: 20px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo" onclick="window.location.href='?url=home'" style="cursor:pointer">
            <strong>ESTÁGIO INTERNO</strong>
        </div>
        <nav class="nav-buttons">
            <button onclick="window.location.href='?url=home/cadastro'">Cadastre-se</button>
            <button onclick="window.location.href='?url=home/login'">Login</button>
        </nav>
    </header>
    <main>
