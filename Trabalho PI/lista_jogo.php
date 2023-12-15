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
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Lista de Jogos</title>
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f0f5f9;
    margin: 0;
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

h1 {
    text-align: center;
    color: #2e3a47;
    margin-top: 50px; 
}

.jogos {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    align-items: flex-start;
    padding-top: 20px; 
}

.jogo {
    background-color: #ffffff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    margin-bottom: 20px;
}

.jogo strong {
    font-weight: bold;
    color: #2e3a47;
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
table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #333; 
            text-align: left;
            padding: 10px;
        }

        th {
            background-color: #444; 
            color: #fff; 
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

    <h1>Lista de Jogos</h1>
    <div class="jogos">
        <table>
            <thead>
                <tr>
                    <th>Nome do Jogo</th>
                    <th>Desenvolvedor</th>
                    <th>Data de Lançamento</th>
                    <th>Gêneros</th>
                    <th>Plataforma</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('conexao.php');
                try {
                    $query = "SELECT * FROM tb_jogo";
                    $stmt = $pdo->query($query);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . $row['nm_jogo'] . '</td>';
                        echo '<td>' . $row['nm_desenvolvedor'] . '</td>';
                        echo '<td>' . $row['dt_lancamento'] . '</td>';
                        echo '<td>' . $row['nm_genero'] . '</td>';
                        echo '<td>' . $row['nm_plataforma'] . '</td>';
                        echo '<td><a href="editar_jogo.php?id=' . $row['id_jogo'] . '">Editar</a></td>';
                        echo '<td><a href="excluir_jogo.php?id=' . $row['id_jogo'] . '">Excluir</a></td>';
                        echo '</tr>';
                    }
                } catch (PDOException $e) {
                    echo "Erro ao exibir os jogos: " . $e->getMessage();
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>