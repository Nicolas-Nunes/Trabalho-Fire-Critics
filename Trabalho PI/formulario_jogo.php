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
    <title>Formulário de Cadastro de Jogo</title>
    <style>

        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0; 
}

.menu {
    background-color: #a1f3f3;
    padding: 20px;
    position: fixed;
    width: 98%;
    top: 0;
    left: 0;
    z-index: 1000;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 80px auto 0; 
}

input[type="text"],
input[type="date"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

label {
    font-weight: bold;
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
    <form action="cadastrar_jogo.php" method="POST">
        <label for="nome_do_jogo">Nome do Jogo:</label>
        <input type="text" id="nome_do_jogo" name="nome_do_jogo"><br>
        
        <label for="desenvolvedor">Desenvolvedor:</label>
        <input type="text" id="desenvolvedor" name="desenvolvedor"><br>
        
        <label for="data_de_lancamento">Data de Lançamento:</label>
        <input type="date" id="data_de_lancamento" name="data_de_lancamento"><br>
        
        <label for="genero">Gênero:</label>
        <input type="text" id="genero" name="genero"><br>
        
        <label for="plataformas">Plataforma:</label>
        <input type="text" id="plataformas" name="plataformas"><br>
        
        <input type="submit" value="Cadastrar Jogo">
    </form>
</body>
</html>