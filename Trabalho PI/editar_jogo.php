<?php
session_start(); 
   
if(isset($_SESSION['usuario_nome']) && !empty($_SESSION['usuario_nome'])) {
    $nomeUsuario = $_SESSION['usuario_nome'];
    echo "Bem-vindo, $nomeUsuario!";
} else {
    
    header('Location: login.php');
    exit();
}
include_once('conexao.php');

// verificando se o id do jogo foi passado via get
if (isset($_GET['id'])) {
    $id_jogo = $_GET['id'];

    try {
        $query = "SELECT * FROM tb_jogo WHERE id_jogo = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id_jogo]);
        $jogo = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$jogo) {
            echo "Jogo não encontrado!";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar o jogo: " . $e->getMessage();
        exit;
    }
} else {
    echo "ID do jogo não especificado!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css"> 
    <link rel="stylesheet" href="css/style.css"> 
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
    <title>Editar Jogo</title>
</head>
<body>
<div class="menu">
        <ul>
            <li><a href="home.php">Inicio</a></li> 
            <li><a href="lista_jogo.php">Lista de jogos</a></li>
        </ul>
        <a href="logout.php" class="btn-sair">Sair</a>
    </div>
    <h1></h1>
    <form action="atualizar_jogo.php" method="POST">
        <input type="hidden" name="id_jogo" value="<?php echo $jogo['id_jogo']; ?>">
        
        <label for="nome_do_jogo">Nome do Jogo:</label>
        <input type="text" id="nome_do_jogo" name="nome_do_jogo" value="<?php echo $jogo['nm_jogo']; ?>"><br>
        
        <label for="desenvolvedor">Desenvolvedor:</label>
        <input type="text" id="desenvolvedor" name="desenvolvedor" value="<?php echo $jogo['nm_desenvolvedor']; ?>"><br>
        
        <label for="data_de_lancamento">Data de Lançamento:</label>
        <input type="date" id="data_de_lancamento" name="data_de_lancamento" value="<?php echo $jogo['dt_lancamento']; ?>"><br>
        
        <label for="genero">Gêneros:</label>
        <input type="text" id="genero" name="genero" value="<?php echo $jogo['nm_genero']; ?>"><br>
        
        <label for="plataformas">Plataforma:</label>
        <input type="text" id="plataformas" name="plataformas" value="<?php echo $jogo['nm_plataforma']; ?>"><br>

        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>