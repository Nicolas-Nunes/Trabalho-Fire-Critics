<?php
session_start(); 

if(isset($_SESSION['usuario_nome']) && !empty($_SESSION['usuario_nome'])) {
    $nomeUsuario = $_SESSION['usuario_nome'];
    echo "Bem-vindo, $nomeUsuario!";
} else {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilo_conteudo_intro.css">  
    <title>Document</title>

    <style>
        body {
            background-color: #f0f5f9;
            margin: 0; 
            padding: 0; 
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
            font-family: Arial, sans-serif;
        }
        .conteudo {
            flex: 1; 
            padding: 20px; 
        }
        .btn-cadastrar {
            display: block; 
            width: fit-content; 
            margin: 20px auto 10px; 
            padding: 10px 20px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .btn-cadastrar:hover {
            background-color: #45a049;
        }
        .menu {
            position: relative;
        }
        
        .btn-sair {
            position: absolute;
            top: 10px; 
            right: 10px; 
            padding: 8px 16px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-sair:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="home.php">Inicio</a></li> 
            <li><a href="lista_jogo.php">Lista de jogos</a></li>
        </ul>
        <a href="logout.php" class="btn-sair">Sair</a>
    </div>

    <div class="conteudo">
        <?php
        // carregando e imprimindo o conteúdo do arquivo html que foi separado
        $conteudo = file_get_contents('conteudo_intro.html');
        echo $conteudo;
        ?>
    </div>

    <a href="formulario_jogo.php" class="btn-cadastrar">Adicionar Jogo</a>
</body>
</html>